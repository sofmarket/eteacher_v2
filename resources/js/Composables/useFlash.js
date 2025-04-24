import swal from "sweetalert2";

export function useFlash() {

    function flashErrorMessage(message = "", title = "فشل العملية")
    {
        swal.fire({
            icon: "error",
            title: title,
            text: message,
            confirmButtonText: "حسنا",
            buttonsStyling: false,
            customClass: {
                confirmButton: "btn btn-primary px-4 my-3",
                icon: 'border-0'
            },
            didOpen: () => {
                document.activeElement.blur()
            }
        })
    }

    function flashConfirmMessage(message = "", title = "", icon = null)
    {
        if(icon === null) {
            icon = `
                <svg width="40" height="40" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.9987 5.3335C17.3054 5.3335 5.33203 17.3068 5.33203 32.0002C5.33203 46.6935 17.3054 58.6668 31.9987 58.6668C46.692 58.6668 58.6654 46.6935 58.6654 32.0002C58.6654 17.3068 46.692 5.3335 31.9987 5.3335ZM44.7454 25.8668L29.6254 40.9868C29.252 41.3602 28.7454 41.5735 28.212 41.5735C27.6787 41.5735 27.172 41.3602 26.7987 40.9868L19.252 33.4402C18.4787 32.6668 18.4787 31.3868 19.252 30.6135C20.0254 29.8402 21.3054 29.8402 22.0787 30.6135L28.212 36.7468L41.9187 23.0402C42.692 22.2668 43.972 22.2668 44.7454 23.0402C45.5187 23.8135 45.5187 25.0668 44.7454 25.8668Z" fill="#137D0A"/>
               </svg>
            `
        }

        return swal.fire({
            iconHtml: icon,
            title: title,
            text: message,
            confirmButtonText: "حسنا",
            customClass: {
                confirmButton: "btn px-4 my-3 btn-outline-primary",
                cancelButton: "btn px-4 my-3 btn-outline-danger",
                icon: 'border-0'
            },
            buttonsStyling: false,
            didOpen: () => {
                document.activeElement.blur()
            }
        });
    }

    function flashFlashMessage(title = "تم التعديل بنجاح", icon = null)
    {
        if(icon === null) {
            icon = `
                <svg width="40" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.9987 5.3335C17.3054 5.3335 5.33203 17.3068 5.33203 32.0002C5.33203 46.6935 17.3054 58.6668 31.9987 58.6668C46.692 58.6668 58.6654 46.6935 58.6654 32.0002C58.6654 17.3068 46.692 5.3335 31.9987 5.3335ZM44.7454 25.8668L29.6254 40.9868C29.252 41.3602 28.7454 41.5735 28.212 41.5735C27.6787 41.5735 27.172 41.3602 26.7987 40.9868L19.252 33.4402C18.4787 32.6668 18.4787 31.3868 19.252 30.6135C20.0254 29.8402 21.3054 29.8402 22.0787 30.6135L28.212 36.7468L41.9187 23.0402C42.692 22.2668 43.972 22.2668 44.7454 23.0402C45.5187 23.8135 45.5187 25.0668 44.7454 25.8668Z" fill="#137D0A"/>
                </svg>
            `
        }

        swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            didOpen: (toast) => {
                toast.onmouseenter = swal.stopTimer;
                toast.onmouseleave = swal.resumeTimer;
            }
        }).fire({
            iconHtml: icon,
            title: title,
            customClass: {
                icon: 'border-0'
            },
        });
    
    }

    function flashConfirmInput(title, options = {}) {
        return swal.fire({
            title: title,
            input: "inputType" in options ? options.inputType : 'textarea',
            inputValue: "inputValue" in options ? options.inputValue : '',
            showCancelButton: true,
            confirmButtonText: "confirmButtonText" in options ? options.confirmButtonText : 'إرسال',
            cancelButtonText: "cancelButtonText" in options ? options.cancelButtonText : 'تراجع',
            customClass: {
                confirmButton: "btn btn-outline-danger px-4 my-3",
                cancelButton: "btn btn-outline-primary px-4 my-3",
                icon: 'border-0'
            },
            buttonsStyling: false,
            didOpen: () => {
                document.activeElement.blur()
            }
        });
    }

    function flashConfirmActionMessage(title , text, options = {})
    {
        let iconHtml = `<svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M49.1639 12.2032C45.4072 11.8298 41.6505 11.5498 37.8705 11.3398V11.3165L37.3572 8.28317C37.0072 6.1365 36.4939 2.9165 31.0339 2.9165H24.9205C19.4839 2.9165 18.9705 5.9965 18.5972 8.25984L18.1072 11.2465C15.9372 11.3865 13.7672 11.5265 11.5972 11.7365L6.8372 12.2032C5.8572 12.2965 5.1572 13.1598 5.25053 14.1165C5.34386 15.0732 6.18386 15.7732 7.16386 15.6798L11.9239 15.2132C24.1505 13.9998 36.4705 14.4665 48.8372 15.7032C48.9072 15.7032 48.9539 15.7032 49.0239 15.7032C49.9105 15.7032 50.6805 15.0265 50.7739 14.1165C50.8439 13.1598 50.1439 12.2965 49.1639 12.2032Z" fill="#EE0606"/>
              <path d="M44.874 18.9935C44.314 18.4102 43.544 18.0835 42.7506 18.0835H13.2573C12.464 18.0835 11.6706 18.4102 11.134 18.9935C10.5973 19.5768 10.294 20.3702 10.3406 21.1868L11.7873 45.1268C12.044 48.6735 12.3706 53.1068 20.514 53.1068H35.494C43.6373 53.1068 43.964 48.6968 44.2206 45.1268L45.6673 21.2102C45.714 20.3702 45.4106 19.5768 44.874 18.9935ZM31.8773 41.4168H24.1073C23.1506 41.4168 22.3573 40.6235 22.3573 39.6668C22.3573 38.7102 23.1506 37.9168 24.1073 37.9168H31.8773C32.834 37.9168 33.6273 38.7102 33.6273 39.6668C33.6273 40.6235 32.834 41.4168 31.8773 41.4168ZM33.8373 32.0835H22.1706C21.214 32.0835 20.4206 31.2902 20.4206 30.3335C20.4206 29.3768 21.214 28.5835 22.1706 28.5835H33.8373C34.794 28.5835 35.5873 29.3768 35.5873 30.3335C35.5873 31.2902 34.794 32.0835 33.8373 32.0835Z" fill="#EE0606"/>
              </svg>
              `
        if("iconHtml" in options ) {
            iconHtml = options['iconHtml']
        }

        return swal.fire({
            title: title,
            text: text,
            iconHtml: iconHtml,
            showCancelButton: "showCancelButton" in options ? options.showCancelButton : true,
            confirmButtonColor: "#f1416c",
            confirmButtonText: "confirmButtonText" in options ? options.confirmButtonText : "نعم, احذف!",
            cancelButtonText: "cancelButtonText" in options ? options.cancelButtonText : 'تراجع',
            customClass: "customClass" in options ? options.customClass : {
                confirmButton: "btn btn-outline-danger me-2 px-4 my-3",
                cancelButton: "btn btn-outline-primary px-4 my-3",
                icon: 'border-0'
            },
            buttonsStyling: false,
            didOpen: () => {
                document.activeElement.blur()
            }
        })
    }

    function flashNotificationMessage(notification) 
    {
        swal.mixin({
            toast: true,
            position: "top-start",
            showConfirmButton: false,
            timer: 3000,
            didOpen: (toast) => {
                toast.onmouseenter = swal.stopTimer;
                toast.onmouseleave = swal.resumeTimer;
                toast.addEventListener('click', () => {
                    window.location.href = notification.url;
                });
            }
        }).fire({
            iconHtml: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.3399 14.49L18.3399 12.83C18.1299 12.46 17.9399 11.76 17.9399 11.35V8.82C17.9399 6.47 16.5599 4.44 14.5699 3.49C14.0499 2.57 13.0899 2 11.9899 2C10.8999 2 9.91994 2.59 9.39994 3.52C7.44994 4.49 6.09994 6.5 6.09994 8.82V11.35C6.09994 11.76 5.90994 12.46 5.69994 12.82L4.68994 14.49C4.28994 15.16 4.19994 15.9 4.44994 16.58C4.68994 17.25 5.25994 17.77 5.99994 18.02C7.93994 18.68 9.97994 19 12.0199 19C14.0599 19 16.0999 18.68 18.0399 18.03C18.7399 17.8 19.2799 17.27 19.5399 16.58C19.7999 15.89 19.7299 15.13 19.3399 14.49Z" fill="#ffc700"></path>
                        <path d="M14.8297 20.01C14.4097 21.17 13.2997 22 11.9997 22C11.2097 22 10.4297 21.68 9.87969 21.11C9.55969 20.81 9.31969 20.41 9.17969 20C9.30969 20.02 9.43969 20.03 9.57969 20.05C9.80969 20.08 10.0497 20.11 10.2897 20.13C10.8597 20.18 11.4397 20.21 12.0197 20.21C12.5897 20.21 13.1597 20.18 13.7197 20.13C13.9297 20.11 14.1397 20.1 14.3397 20.07C14.4997 20.05 14.6597 20.03 14.8297 20.01Z" fill="#ffc700"></path>
                    </svg>`,
            html: notification.message,
            customClass: {
                icon: 'border-0'
            }
        });
    }

    return {
        flashErrorMessage,
        flashFlashMessage,
        flashConfirmMessage,
        flashConfirmInput,
        flashConfirmActionMessage, //TODO: I rename this from 'flashConfirmDeleteMessage' to flashConfirmActionMessage
        flashNotificationMessage
    };
}
