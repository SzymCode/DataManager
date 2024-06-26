<template>
    <div class="panelContainer">
        <Card v-if="display.Activity" class="myCard chartCard annualChartCard">
            <template #content>
                <my-chart
                    :chart-method-type="'annual'"
                    :type="'bar'"
                    :direction="'vertical'"
                    :activity-log-data="activities"
                    :chart-class="'h-30rem'"
                />
                <progress-spinner-atom v-if="loading" />
            </template>
        </Card>
        <Card class="myCard">
            <template #title>
                <div class="myCardHeaderContainer">
                    <h3>Activity Log</h3>
                </div>
            </template>
            <template #content>
                <DataTable
                    :value="activities"
                    :loading="loading"
                    :size="'small'"
                    :rows="10"
                    :row-hover="true"
                    v-if="activities"
                    paginator
                    stripedRows
                    @row-click="openModal('show', $event.data)"
                    paginatorTemplate="RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
                    currentPageReportTemplate="{first} to {last} of {totalRecords}"
                >
                    <template #loading><progress-spinner-atom /></template>
                    <Column
                        field="id"
                        :sortable="true"
                        header="ID"
                        class="idActivityColumn"
                    />
                    <Column
                        field="description"
                        :sortable="true"
                        header="Description"
                        class="descriptionColumn"
                    />
                    <Column
                        field="created_at"
                        :sortable="true"
                        header="Created At"
                        class="createdAtActivityColumn"
                    />
                    <Column class="actionColumn">
                        <template #body="row">
                            <div class="actionColumnContent">
                                <button-atom
                                    class="dataTableButton"
                                    icon="pi pi-trash"
                                    @click="openModal('delete', row.data)"
                                    :rounded="true"
                                    :style="activityStyle"
                                />
                            </div>
                        </template>
                    </Column>
                </DataTable>
                <div v-else>Loading data or no data available...</div>
            </template>
        </Card>
    </div>
    <Dialog :visible="visibleDelete" modal header="Confirm delete activity">
        <div class="flex justify-content-between">
            <button-atom
                label="Cancel"
                severity="secondary"
                @click="closeModal('delete')"
                :rounded="true"
            />
            <button-atom
                label="Confirm"
                @click="
                    deleteActivity(
                        selectedObject!.id!,
                        getAllActivities,
                        closeModal
                    )
                "
                :rounded="true"
                :style="activityStyle"
            />
        </div>
    </Dialog>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'

import { MyChart } from '@/components'
import { activityApiMethods, useDisplayCharts, useMenuAndModal } from '@/utils'

import { handleStyles } from 'atomic/bosons/constants'

const { display } = useDisplayCharts()
const { visibleDelete, selectedObject, openModal, closeModal } =
    useMenuAndModal()

const {
    results: activities,
    loading,
    getAllActivities,
    deleteActivity,
} = activityApiMethods()

const { activityStyle } = handleStyles()

onMounted(() => {
    getAllActivities(500)
})
</script>

<style scoped>
:deep(.p-progress-spinner-circle) {
    stroke: var(--activity-item-color);
    animation: p-progress-spinner-dash 1.2s ease-in-out infinite;
}
</style>
