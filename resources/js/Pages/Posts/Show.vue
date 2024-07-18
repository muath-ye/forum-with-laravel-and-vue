<template>
    <AppLayout :title="post.title">
        <Container>
            <h1 class="text-2xl font-bold">{{ post.title }}</h1>
            <span class="block mt-1 text-sm text-gray-600">{{ formattedDate }} ago by {{ post.user.name }}</span>
            <article class="mt-6">
                {{ post.body }}
            </article>
        </Container>
    </AppLayout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue"
import Container from "@/Components/Container.vue"
import { formatDistance, parseISO } from "date-fns"
import { computed } from "vue"

// const post = 
const props = defineProps(['post']);

const formattedDate = computed(() => formatDistance(parseISO(props.post.created_at), new Date()));
</script>
