/**
 *  Activity log
 */
export { default as activityApiMethods } from './activity/handleActivityApiMethods'

/**
 *  Article
 */
export { default as articleApiMethods } from './article/handleArticleApiMethods'

/**
 *  Auth
 */
export { default as logout } from './auth/handleLogout'
export { default as useSubmitAuthForm } from './auth/handleUseSubmitAuthForm'
export { default as testLogin } from './auth/handleTestLogin'

/**
 *  Contact
 */
export { default as contactApiMethods } from './contact/handleContactApiMethods'

/**
 *  Support
 */
export { default as getLowerCase } from './support/getLowerCase'
export { default as closeToast } from './support/handleCloseToast'
export { default as darkenColor } from './support/handleDarkenColor'
export { default as isCurrentUrl } from './support/handleIsCurrentUrl'
export { default as openMenu } from './support/handleOpenMenu'
export { default as navigateTo } from './support/handleNavigateTo'
export { default as setOpacity } from './support/handleSetOpacity'
export { default as useColorPicker } from './support/handleUseColorPicker'
export { default as useColors } from './support/handleUseColors'
export { default as useDisplayGraphs } from './support/handleUseDisplayGraphs'
export { default as useDragItems } from './support/handleUseDragItems'
export { default as useIsAdmin } from './support/handleUseIsAdmin'
export { default as useFlashToast } from './support/handleFlashToast'
export { default as useApiErrors } from './support/handleApiErrors'
export { default as useChart } from './support/handleUseChart'
export { default as useMenuAndModal } from './support/handleUseMenuAndModal'
export { default as useSidebar } from './support/handleUseSidebar'

/**
 *  User
 */
export { default as removeUserFromSessionStorage } from './user/handleRemoveUserFromSessionStorage'
export { default as setUserToSessionStorage } from './user/handleSetUserToSessionStorage'
export { default as userApiMethods } from './user/handleUserApiMethods'
