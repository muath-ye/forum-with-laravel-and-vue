<template>
  <div class="flex items-center justify-between border-t border-gray-200 px-4 py-3 sm:px-6">
    <div class="flex flex-1 justify-between sm:hidden">
      <Link :href="previousUr1" preserve-scroll :only="only" v-html="'<span>Previous</span>'" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50" />
      <Link :href="nextUrl" preserve-scroll :only="only" v-html="'<span>Next</span>'" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50" />
    </div>
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Showing
          {{ ' ' }}
          <span class="font-medium">{{ meta.from }}</span>
          {{ ' ' }}
          to
          {{ ' ' }}
          <span class="font-medium">{{ meta.to }}</span>
          {{ ' ' }}
          of
          {{ ' ' }}
          <span class="font-medium">{{ meta.total }}</span>
          {{ ' ' }}
          results
        </p>
      </div>
      <div>
        <nav class="bg-white isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
          <Link v-for="link in meta.links" :key="link.url" :href="link.url" :only="only" v-html="link.label" preserve-scroll
            class="relative inline-flex items-center first-of-type:rounded-l-md last-of-type:rounded-r-md px-3 py-2"
            :class="link.active ? 'z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0'" />
          <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
        </nav>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue';

const props = defineProps({
  'meta': {
    type: Object,
    required: true
  },
  'only': {
    type: Array,
    default: () => []
  },
});

const previousUr1 = computed(() => props.meta.links[0].url);
const nextUrl = computed(() => [...props.meta.links].reverse()[0].url);
</script>
