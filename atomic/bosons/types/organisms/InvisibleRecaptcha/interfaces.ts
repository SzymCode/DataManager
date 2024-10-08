export interface InvisibleRecaptchaInterface {
    sitekey?: string
    validate?: () => void
    callback?: () => void
    type?: string
    id?: string
    disabled?: boolean
}
