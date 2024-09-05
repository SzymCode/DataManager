import {
    ColorItemStyleInterface,
    UseColorsReturnInterface,
    HandleStylesInterface,
} from 'atomic/bosons/types'
import { useColors } from 'atomic/bosons/utils'

export function handleStyles(): HandleStylesInterface {
    const {
        mainItemColors,
        activityItemColors,
        articleItemColors,
        contactItemColors,
        userItemColors,
    }: UseColorsReturnInterface = useColors()

    /**
     *  Main
     */
    const mainItemStyle: ColorItemStyleInterface = {
        color: mainItemColors.primary,
        backgroundColor: mainItemColors.selected,
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
    const activityItemStyle: ColorItemStyleInterface = {
        color: activityItemColors.primary,
        backgroundColor: activityItemColors.selected,
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
    const articleItemStyle: ColorItemStyleInterface = {
        color: articleItemColors.primary,
        backgroundColor: articleItemColors.selected,
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
    const contactItemStyle: ColorItemStyleInterface = {
        color: contactItemColors.primary,
        backgroundColor: contactItemColors.selected,
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
    const userItemStyle: ColorItemStyleInterface = {
        color: userItemColors.primary,
        backgroundColor: userItemColors.selected,
        boxShadow: 'none',
    }
    const userStyle: ColorItemStyleInterface = {
        backgroundColor: userItemColors.primary,
        borderColor: userItemColors.primary,
        boxShadow: 'none',
    }

    return {
        mainStyle,
        activityStyle,
        articleStyle,
        contactStyle,
        userStyle,
        mainItemStyle,
        activityItemStyle,
        articleItemStyle,
        contactItemStyle,
        userItemStyle,
    }
}
