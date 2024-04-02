import { CSRFTokenType, CSRFTokenInputType, LogoutFormType } from '@/types'
import { removeUserFromSessionStorage } from '@/utils'

export default function logout(): void {
    const csrf: CSRFTokenType = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute('content')
    const form: LogoutFormType = document.getElementById(
        'logout-form'
    ) as LogoutFormType

    let csrfInput: CSRFTokenInputType

    switch (true) {
        case csrf === null:
            console.error('CSRF token not found.')
            return
        case form === null:
            console.error('Logout form not found.')
            return
        default:
            csrfInput = form?.querySelector('input[name="_token"]')
            switch (csrfInput !== null) {
                case true:
                    removeUserFromSessionStorage()
                    csrfInput?.setAttribute('value', csrf!)
                    form?.submit()
                    break
                default:
                    console.error(
                        'CSRF token input not found in the logout form.'
                    )
            }
    }
}
