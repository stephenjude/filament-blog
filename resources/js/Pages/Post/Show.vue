<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ContentContainer from "@/Layouts/ContentContainer.vue";
import {Link} from '@inertiajs/inertia-vue3'

const props = defineProps({
    post: Object,
    morePosts: Object
});
</script>
<template>
    <AppLayout :title="post.data.title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Blog
            </h2>
        </template>

        <ContentContainer>
            <div class="grid md:grid-cols-3 md:divide-x divide-gray-300 gap-8">
                <div class="prose prose-sm md:prose-lg prose-gray mx-auto mt-6 text-gray-500 blog col-span-2">
                    <div class="flex flex-col gap-2">
                        <span class="text-4xl leading-6 text-gray-900 font-bold">{{ post.data.title }}</span>
                        <span class="text-sm">{{ post.data.date }} in {{ post.data.category }}</span>
                    </div>
                    <figure v-if="post.data.image !== ''">
                        <img class="w-full rounded-lg"
                             :src="post.data.image"
                             alt=""/>
                        <figcaption></figcaption>
                    </figure>
                    <div v-html="post.data.content"></div>
                    <template v-for="tag in post.data.tags">
                        <Link :href="route('tag.show', tag.slug)">
                        <span
                            class="inline-flex items-center rounded-md bg-gray-200 px-3 py-1 text-sm font-medium text-gray-700">
                            {{ tag.name }}
                          </span>
                        </Link>
                    </template>
                </div>
                <div class="col-span-1 px-4">
                    <div class="space-y-4">
                        <img class="h-20 w-20 rounded-full lg:h-24 lg:w-24"
                             :src="post.data.author.cropped"
                             :alt="post.data.author.name">
                        <div class="space-y-2">
                            <div class="text-xs font-medium lg:text-sm">
                                <h3 class="text-lg text-gray-600">{{ post.data.author.name }}</h3>
                                <p class="text-gray-400 leading-5 text-sm"> {{ post.data.author.bio }}</p>
                            </div>
                        </div>
                        <div v-if="morePosts.length > 0">
                            <h4>More From Us</h4>
                            <ul role="list" class="divide-y divide-gray-200 border-t border-b border-gray-200">
                                <template v-for="mpost in morePosts.data">
                                    <li class="flex py-6">
                                        <div class="flex-shrink-0">
                                            <Link :href="route('post.show', mpost.id)">
                                                <img
                                                    :src="mpost.thumb"
                                                    :alt="mpost.title"
                                                    class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32">
                                            </Link>
                                        </div>
                                        <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                            <div>
                                                <div class="flex justify-between">
                                                    <h4 class="text-sm">
                                                        <Link :href="route('post.show', mpost.id)"
                                                              class="font-medium text-gray-700 hover:text-gray-800">
                                                            {{ mpost.title }}
                                                        </Link>
                                                    </h4>
                                                </div>
                                                <template v-for="mtag in mpost.tags">
                                                    <Link :href="route('tag.show', mtag.id)">
                                                        <p class="mt-1 text-sm text-gray-500">{{ mtag.name.en }}</p>
                                                    </Link>
                                                </template>
                                            </div>

                                            <div class="mt-4 flex flex-1 items-end justify-between">
                                                <p class="flex items-center space-x-2 text-sm text-gray-700">
                                                    <span>{{ mpost.author.name }}</span>
                                                    <span>{{ mpost.reading_time }}min read</span>

                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </template>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </ContentContainer>
    </AppLayout>
</template>
