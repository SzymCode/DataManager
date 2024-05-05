import {
    ColorItemColorsInterface,
    ColorItemStyleInterface,
    HandleStylesInterface,
} from '@/types'
import { useColors } from '@/utils'

export default function handleStyles(): HandleStylesInterface {
    const {
        mainItemColors,
        activityItemColors,
        articleItemColors,
        contactItemColors,
        userItemColors,
    }: {
        mainItemColors: ColorItemColorsInterface
        activityItemColors: ColorItemColorsInterface
        articleItemColors: ColorItemColorsInterface
        contactItemColors: ColorItemColorsInterface
        userItemColors: ColorItemColorsInterface
    } = useColors()

    /**
     *  Main
     */
    const mainSidebarItemStyle: ColorItemStyleInterface = {
        color: mainItemColors.primary,
        backgroundColor: mainItemColors.sidebarSelected,
        boxShadow: 'none',
    }
    const mainStyle: ColorItemStyleInterface = {
        backgroundColor: mainItemColors.primary,
        borderColor: mainItemColors.primary,
        boxShadow: 'none',
    }

    /**
     *  Activity
     */
    const activitySidebarItemStyle: ColorItemStyleInterface = {
        color: activityItemColors.primary,
        backgroundColor: activityItemColors.sidebarSelected,
        boxShadow: 'none',
    }
    const activityStyle: ColorItemStyleInterface = {
        backgroundColor: activityItemColors.primary,
        borderColor: activityItemColors.primary,
        boxShadow: 'none',
    }

    /**
     *  Article
     */
    const articleSidebarItemStyle: ColorItemStyleInterface = {
        color: articleItemColors.primary,
        backgroundColor: articleItemColors.sidebarSelected,
        boxShadow: 'none',
    }
    const articleStyle: ColorItemStyleInterface = {
        backgroundColor: articleItemColors.primary,
        borderColor: articleItemColors.primary,
        boxShadow: 'none',
    }

    /**
     *  Contact
     */
    const contactSidebarItemStyle: ColorItemStyleInterface = {
        color: contactItemColors.primary,
        backgroundColor: contactItemColors.sidebarSelected,
        boxShadow: 'none',
    }
    const contactStyle: ColorItemStyleInterface = {
        backgroundColor: contactItemColors.primary,
        borderColor: contactItemColors.primary,
        boxShadow: 'none',
    }

    /**
     *  User
     */
    const userSidebarItemStyle: ColorItemStyleInterface = {
        color: userItemColors.primary,
        backgroundColor: userItemColors.sidebarSelected,
        boxShadow: 'none',
    }
    const userStyle: ColorItemStyleInterface = {
        backgroundColor: userItemColors.primary,
        borderColor: userItemColors.primary,
        boxShadow: 'none',
    }

    return {
        mainSidebarItemStyle,
        mainStyle,
        activitySidebarItemStyle,
        activityStyle,
        articleSidebarItemStyle,
        articleStyle,
        contactSidebarItemStyle,
        contactStyle,
        userSidebarItemStyle,
        userStyle,
    }
}
