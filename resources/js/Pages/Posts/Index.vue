<template>
    <AppLayout title="Posts">
        <Container>
            <ul class="divide-y">
                <li v-for="post in posts.data" :key="post.id" class="px-2 py-4">
                    <Link :href="route('posts.show', post.id)" class="group">
                    <span class="text-bold text-lg group-hover:text-indigo-500">{{ post.title }}</span>
                    <span class="block mt-1 text-sm text-gray-600">{{ formattedDate(post) }} ago by {{ post.user.name }}</span>
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
import { formatDistance, parseISO } from "date-fns"

const props = defineProps(['posts']);
console.log(props.posts)
const formattedDate = (post) => {
    return formatDistance(parseISO(post.created_at), new Date());
}
</script>
