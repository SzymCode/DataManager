import { ref } from 'vue'

import {
    IsAdminType,
    UseIsAdminFunctionType,
    UserIdType,
    UserInterface,
} from '@/types'
import { setUserToSessionStorage, userApiMethods } from '@/utils'

export default async function useIsAdmin(): UseIsAdminFunctionType {
    const isAdmin: IsAdminType = ref(null)
    const user_id: UserIdType = window.sessionStorage.getItem('user_id')

    const { getUser } = userApiMethods()

    if (!user_id) {
        await getUser().then((user: void | UserInterface): void => {
            if (user) {
                setUserToSessionStorage(user)
            }
        })
    }

    const userRole: string = window.sessionStorage.getItem('user_role') ?? ''
    isAdmin.value =
        userRole === 'admin' ||
        userRole === 'test_admin' ||
        userRole === 'super_admin'

    return { isAdmin }
}
