import { AppType } from 'vite'

import {
    Chart,
    DataTable,
    DataTableSkeleton,
    Dialog,
    Dock,
    InvisibleRecaptcha,
    OverlayPanel,
    Password,
    Terminal,
    Tile,
} from './'

export default function registerOrganisms(app: AppType): void {
    app
        /**
         *  Chart
         */
        .component('ad-chart', Chart)

        /**
         *  DataTable
         */
        .component('ad-data-table', DataTable)
        .component('ad-data-table-skeleton', DataTableSkeleton)

        /**
         *  Dialog
         */
        .component('ad-dialog', Dialog)

        /**
         *  Dock
         */
        .component('ad-dock', Dock)

        /**
         *  InvisibleRecaptcha
         */
        .component('ad-invisible-recaptcha', InvisibleRecaptcha)

        /**
         *  OverlayPanel
         */
        .component('ad-overlay-panel', OverlayPanel)

        /**
         *  Password
         */
        .component('ad-password', Password)

        /**
         *  Terminal
         */
        .component('ad-terminal', Terminal)

        /**
         *  Tile
         */
        .component('ad-tile', Tile)
}
