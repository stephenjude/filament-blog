<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from "../../Components/Pagination.vue";
import {Link} from '@inertiajs/inertia-vue3'

const props = defineProps({
    posts: Object,
    tag: Object
});
</script>
<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Blog Posts
                <span v-if="tag">Tagged with: {{ tag.name.en }}</span>
            </h2>
        </template>

        <div class="relative bg-gray-50 px-6 pt-8 pb-20 lg:px-8 lg:pt-12 lg:pb-28">
            <div class="absolute inset-0">
                <div class="h-1/3 bg-white sm:h-2/3"/>
            </div>
            <div class="relative mx-auto max-w-7xl">
                <div class="text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">From the blog</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">
                        Get the latest updates and tips for perfecting your photos on My Best Pic's blog! From
                        photography hacks to feature announcements, stay informed and take your shots to the next level.
                    </p>
                </div>
                <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
                    <div v-for="post in posts.data" :key="post.slug"
                         class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover" :src="post.thumb" alt=""/>
                        </div>
                        <div class="flex flex-1 flex-col justify-between bg-white p-6">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-indigo-600">
                                        <span class="hover:underline">
                                            {{ post.category }}
                                        </span>
                                </p>
                                <Link :href="route('post.show', post.slug)" class="mt-2 block">
                                    <p class="text-xl font-semibold text-gray-900">{{ post.title }}</p>
                                    <p class="mt-3 text-base text-gray-500">{{ post.description }}</p>
                                </Link>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <a href="#">
                                        <span class="sr-only">{{ post.author.name }}</span>
                                        <img class="h-10 w-10 rounded-full" :src="post.author.image" alt=""/>
                                    </a>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">
                                        <span>
                                            {{ post.author.name }}
                                        </span>
                                    </p>
                                    <div class="flex space-x-1 text-sm text-gray-500">
                                        <time :datetime="post.datetime">{{ post.date }}</time>
                                        <span aria-hidden="true">&middot;</span>
                                        <span>{{ post.reading_time }}min read</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pb-20">
                    <template v-if="posts.meta.total > 9">
                        <Pagination :links="posts.links" :meta="posts.meta"/>
                    </template>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
