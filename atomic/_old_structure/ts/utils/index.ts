/**
 *  Activity log
 */
export { default as activityApiMethods } from './activity/activityApiMethods'

/**
 *  Article
 */
export { default as articleApiMethods } from './article/articleApiMethods'

/**
 *  Auth
 */
export { default as logout } from './auth/logout'
export { default as testLogin } from './auth/testLogin'

/**
 *  Contact
 */
export { default as contactApiMethods } from './contact/contactApiMethods'

/**
 *  Support
 */
export { default as getLowerCase } from './support/getLowerCase'
export { default as isCurrentUrl } from './support/isCurrentUrl'
export { default as openMenu } from './support/openMenu'
export { default as navigateTo } from './support/navigateTo'
export { default as useIsAdmin } from './support/useIsAdmin'
export { default as useApiErrors } from './support/useApiErrors'
export { default as useLoading } from './support/useLoading'
export { default as useMenuAndModal } from './support/useMenuAndModal'
export { default as useNavbar } from './support/useNavbar'
export { default as useThrottle } from './support/useThrottle'

/**
 *  User
 */
export { default as removeUserFromSessionStorage } from './user/removeUserFromSessionStorage'
export { default as setUserToSessionStorage } from './user/setUserToSessionStorage'
export { default as userApiMethods } from './user/userApiMethods'
