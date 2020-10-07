<template>
  <el-form :inline="true" :model="filter" v-on:submit="onSubmit">
    <el-form-item label="Name">
      <el-input placeholder="Name" v-model="filter.name"></el-input>
    </el-form-item>
    <el-form-item label="Bedrooms">
      <el-input placeholder="Bedrooms" type="number" v-model="filter.bedRooms"></el-input>
    </el-form-item>
    <el-form-item label="Bathrooms">
      <el-input placeholder="Bathrooms" type="number" v-model="filter.bathRooms"></el-input>
    </el-form-item>
    <el-form-item label="Storeys">
      <el-input placeholder="Storeys" type="number" v-model="filter.storeys"></el-input>
    </el-form-item>
    <el-form-item label="Garages">
      <el-input placeholder="Garages" type="number" v-model="filter.garages"></el-input>
    </el-form-item>
    <el-form-item label="Min price">
      <el-input placeholder="Min price" type="number" v-model="filter.minPrice"></el-input>
    </el-form-item>
    <el-form-item label="Max price">
      <el-input placeholder="Max price" type="number" v-model="filter.maxPrice"></el-input>
    </el-form-item>

    <el-form-item>
      <el-button @click="onReset" icon="el-icon-search" type="secondary">Reset</el-button>
    </el-form-item>
    <el-form-item>
      <el-button @click="onSubmit" icon="el-icon-search" type="primary">Search</el-button>
    </el-form-item>
  </el-form>
</template>

<script>
  export default {
    name: 'ApartmentFilter',
    data () {
      return {
        filter: {
          name: undefined,
          bedRooms: undefined,
          bathRooms: undefined,
          storeys: undefined,
          garages: undefined,
          minPrice: undefined,
          maxPrice: undefined,
        },
      }
    },
    methods: {
      onSubmit () {
        this.$emit('on-filter-change', this.filter)
      },
      onReset () {
        for (let key in this.filter) {
          this.filter[key] = undefined
        }
        this.$emit('on-filter-change', this.filter)
      },
    },
  }
</script>

<style scoped>

</style>
