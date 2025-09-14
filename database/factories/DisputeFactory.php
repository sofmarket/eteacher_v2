<?php

namespace Database\Factories;

use App\Models\Dispute;
use App\Models\User;
use App\Models\SlotBooking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dispute>
 */
class DisputeFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['pending', 'under_review', 'in_discussion', 'closed'];
        $status = $this->faker->randomElement($statuses);
        
        $disputeReasons = [
            'Payment not received',
            'Service not provided as described',
            'Tutor did not show up',
            'Student cancelled without notice',
            'Technical issues during session',
            'Quality of service was poor',
            'Billing dispute',
            'Refund request',
            'Session time mismatch',
            'Communication issues',
            'Inappropriate behavior',
            'Platform technical problems',
        ];

        $disputeDetails = [
            'The tutor did not provide the service as promised in the description.',
            'Payment was processed but the session never took place.',
            'The student cancelled the session at the last minute without proper notice.',
            'There were technical difficulties that prevented the session from being conducted properly.',
            'The quality of the tutoring session was below expectations.',
            'The tutor was unprofessional and did not follow the agreed-upon lesson plan.',
            'The student was not responsive during the session and wasted time.',
            'There was a misunderstanding about the session duration and content.',
            'The platform had technical issues that affected the session quality.',
            'The tutor requested additional payment beyond what was agreed upon.',
        ];

        // Get random users for different roles
        $creator = User::find(2);
        $responsible = User::find(1);
        
        // Get a random booking or create one
        $booking = SlotBooking::find(1);
        
        return [
            'uuid' => Str::uuid(),
            'disputable_type' => SlotBooking::class,
            'disputable_id' => $booking->id,
            'responsible_by' => $responsible->id,
            'creator_by' => $creator->id,
            'dispute_reason' => $this->faker->randomElement($disputeReasons),
            'dispute_detail' => $this->faker->randomElement($disputeDetails),
            'status' => $status,
        ];

    }

    /**
     * Indicate that the dispute is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
            'resolved_by' => null,
            'favour_to' => null,
            'winner_id' => null,
        ]);
    }

    /**
     * Indicate that the dispute is under review.
     */
    public function underReview(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'under_review',
            'resolved_by' => User::where('type', 'admin')->inRandomOrder()->first()?->id ?? User::factory()->create(['type' => 'admin'])->id,
            'favour_to' => null,
            'winner_id' => null,
        ]);
    }

    /**
     * Indicate that the dispute is in discussion.
     */
    public function inDiscussion(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'in_discussion',
            'resolved_by' => null,
            'favour_to' => null,
            'winner_id' => null,
        ]);
    }

    /**
     * Indicate that the dispute is closed.
     */
    public function closed(): static
    {
        $creator = User::find($attributes['creator_by'] ?? null);
        $responsible = User::find($attributes['responsible_by'] ?? null);
        
        return $this->state(function (array $attributes) use ($creator, $responsible) {
            $winner = $this->faker->randomElement([$creator, $responsible]);
            
            return [
                'status' => 'closed',
                'resolved_by' => User::where('type', 'admin')->inRandomOrder()->first()?->id ?? User::factory()->create(['type' => 'admin'])->id,
                'favour_to' => $winner?->id,
                'winner_id' => $winner?->id,
            ];
        });
    }

    /**
     * Indicate that the dispute is in favor of the creator.
     */
    public function favourCreator(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'closed',
                'favour_to' => $attributes['creator_by'],
                'winner_id' => $attributes['creator_by'],
                'resolved_by' => User::where('type', 'admin')->inRandomOrder()->first()?->id ?? User::factory()->create(['type' => 'admin'])->id,
            ];
        });
    }

    /**
     * Indicate that the dispute is in favor of the responsible party.
     */
    public function favourResponsible(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'closed',
                'favour_to' => $attributes['responsible_by'],
                'winner_id' => $attributes['responsible_by'],
                'resolved_by' => User::where('type', 'admin')->inRandomOrder()->first()?->id ?? User::factory()->create(['type' => 'admin'])->id,
            ];
        });
    }

    /**
     * Indicate that the dispute is for a specific booking.
     */
    public function forBooking(SlotBooking $booking): static
    {
        return $this->state(fn (array $attributes) => [
            'disputable_type' => SlotBooking::class,
            'disputable_id' => $booking->id,
            'responsible_by' => $booking->tutor_id,
            'creator_by' => $booking->student_id,
        ]);
    }

    /**
     * Indicate that the dispute is created by a student.
     */
    public function createdByStudent(): static
    {
        return $this->state(fn (array $attributes) => [
            'creator_by' => User::where('type', 'student')->inRandomOrder()->first()?->id ?? User::factory()->create(['type' => 'student'])->id,
        ]);
    }

    /**
     * Indicate that the dispute is created by a tutor.
     */
    public function createdByTutor(): static
    {
        return $this->state(fn (array $attributes) => [
            'creator_by' => User::where('type', 'tutor')->inRandomOrder()->first()?->id ?? User::factory()->create(['type' => 'tutor'])->id,
        ]);
    }

    /**
     * Create a dispute with specific reason.
     */
    public function withReason(string $reason): static
    {
        return $this->state(fn (array $attributes) => [
            'dispute_reason' => $reason,
        ]);
    }
}
