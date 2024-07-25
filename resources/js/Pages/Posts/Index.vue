<template>
    <AppLayout title="Posts">
        <Container>
            <ul class="divide-y">
                <li v-for="post in posts.data" :key="post.id" class="px-2 py-4">
                    <Link :href="route('posts.show', post.id)">
                    <span class="text-bold text-lg">{{ post.title }}</span>
                    </Link>
                </li>
            </ul>

            <Pagination :meta="posts.meta" />
        </Container>
    </AppLayout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue"
import Container from "@/Components/Container.vue"
import Pagination from "@/Components/Pagination.vue"
import { Link } from "@inertiajs/vue3"

defineProps(['posts']);
</script>
