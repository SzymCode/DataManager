import { reactive } from 'vue'

import { DisplayChartsInterface, UseDisplayChartsInterface } from '@/types'

export default function useDisplayCharts(): UseDisplayChartsInterface {
    const display: DisplayChartsInterface = reactive({
        Activity:
            window.localStorage.getItem('display-activity-graphs') !== 'false',
        Admin: window.localStorage.getItem('display-admin-graphs') !== 'false',
        Article:
            window.localStorage.getItem('display-article-graphs') !== 'false',
        Contact:
            window.localStorage.getItem('display-contact-graphs') !== 'false',
    })

    function displayChartsToggle(action: string): void {
        let key: string = ''
        switch (action) {
            case 'Activity':
                key = 'display-activity-graphs'
                break
            case 'Admin':
                key = 'display-admin-graphs'
                break
            case 'Article':
                key = 'display-article-graphs'
                break
            case 'Contact':
                key = 'display-contact-graphs'
                break
            default:
                break
        }
        if (key) {
            const value: string = String(!display[action])
            window.localStorage.setItem(key, value)
            display[action] = !display[action]
        }
    }

    function allChartsDisplayToggle(): void {
        for (const key in display) {
            if (Object.prototype.hasOwnProperty.call(display, key)) {
                const currentValue: boolean = display[key]
                window.localStorage.setItem(
                    `display-${key.toLowerCase()}-graphs`,
                    String(!currentValue)
                )
            }
        }
    }

    function setDefaultChartsDisplay(reload?: boolean): void {
        const properties: string[] = [
            'display-activity-graphs',
            'display-admin-graphs',
            'display-article-graphs',
            'display-contact-graphs',
        ]

        properties.forEach((property: string): void => {
            window.localStorage.setItem(property, 'true')
        })

        if (reload) {
            window.location.reload()
        }
    }

    return {
        display,
        displayChartsToggle,
        setDefaultChartsDisplay,
        allChartsDisplayToggle,
    }
}
