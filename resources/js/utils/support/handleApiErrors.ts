import { ApiErrorsInterface, UseApiErrorsServiceInterface } from '@/types'
import { useFlashToast } from '@/utils'

export default function useApiErrors(): UseApiErrorsServiceInterface {
    const { flashToast } = useFlashToast()

    function apiErrors(error: ApiErrorsInterface): void {
        switch (error.response.status) {
            case 500:
                flashToast(
                    error.response.data.error ||
                        'HTTP 500: Internal Server Error',
                    'error'
                )
                break
            case 404:
                flashToast(
                    error.response.data.error || 'HTTP 404: Not Found',
                    'error'
                )
                break
            case 403:
            case 401:
                flashToast('Unauthorized access', 'error')
                break
            default:
                flashToast(error.response.data.errors, 'warn')
        }
    }

    return { apiErrors }
}
