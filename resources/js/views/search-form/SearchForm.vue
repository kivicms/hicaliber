<template>
  <el-card class="box-card">
    <div class="clearfix" slot="header">
      <span>Search form</span>
    </div>
    <apartment-filter v-on:on-filter-change="onFilterChange"/>
    <data-table :entries="entries" :loading="loading" :meta="meta" v-if="entriesLoaded"
                v-on:sort-change="onSortChange"/>
    <el-pagination
        :current-page="meta.current_pagePage"
        :page-count="meta.last_page"
        :page-size="20"
        :total="meta.total"
        layout="prev, pager, next"
        v-on:current-change="currentPageChanged"
    />
    <el-alert
        show-icon
        title="Data not fount"
        type="warning"
        v-if="showAlert"
    >
    </el-alert>
  </el-card>
</template>

<script>
  import ApartmentFilter from './partials/ApartmentFilter'
  import DataTable from './partials/DataTable'
  import axios from 'axios'
  import qs from 'qs'

  export default {
    name: 'SearchForm',
    components: { DataTable, ApartmentFilter },
    data () {
      return {
        entries: [],
        entriesLoaded: false,
        loading: false,
        meta: {
          current_page: 1,
          last_page: 20,
          total: 200,
          per_page: 15,
        },
        showAlert: false,
        defaultSort: 'name',
        sort: {
          direction: 'ascending',
          field: 'name',
        },
        filter: {},
      }
    },
    mounted () {
      this.fetchData()
    },
    methods: {
      onSortChange ({ prop, order }) {
        if (!order) {
          this.sort = {
            direction: 'ascending',
            field: 'name',
          }
        } else {
          this.sort.field = prop
          this.sort.direction = order ?? 'asc'
        }
        this.fetchData()
      },
      currentPageChanged (page) {
        this.meta.current_page = page
        this.fetchData()
      },
      fetchData () {
        this.loading = true
        axios.get('api/apartments',
          {
            params: {
              page: this.meta.current_page,
              filters: this.filter,
              sort: this.sort.field
                ? (this.sort.direction === 'descending' ? '-' : '') +
                this.sort.field
                : undefined,
            },
            paramsSerializer: params => {
              return qs.stringify(params)
            },
          }).then(response => {
          if (response.data.data.length > 0) {
            this.showAlert = false
            this.entriesLoaded = true
          } else {
            this.showAlert = true
            this.entriesLoaded = false
          }
          this.entries = response.data.data
          this.meta = response.data.meta
          this.loading = false
        }).catch(errors => {
          this.loading = false
          console.log(errors)
        })
      },
      onFilterChange (filter) {
        this.filter = filter
        this.fetchData()
      },
    },
  }
</script>

<style scoped>

</style>
