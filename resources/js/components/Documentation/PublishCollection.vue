<template>
    <div>
        <button @click="publishCollection" type="button" class="w-auto bg-blue-600 outline-none focus:ring-4 text-white transform active:scale-75 transition-transform delay-150 duration-700 ease-in-out fixed right-[3vw] top-[50vw] z-20 text-center font-anek font-bold flex border border-gray-100 flex-grow items-center justify-between rounded-[10px] shadow-sm cursor-pointer px-3 py-2.5 dark:!bg-navy-800 dark:shadow-none md:w-[365px] md:flex-grow-0 md:gap-1 xl:w-[365px] xl:gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.893 13.393l-1.135-1.135a2.252 2.252 0 01-.421-.585l-1.08-2.16a.414.414 0 00-.663-.107.827.827 0 01-.812.21l-1.273-.363a.89.89 0 00-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 01-1.81 1.025 1.055 1.055 0 01-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 01-1.383-2.46l.007-.042a2.25 2.25 0 01.29-.787l.09-.15a2.25 2.25 0 012.37-1.048l1.178.236a1.125 1.125 0 001.302-.795l.208-.73a1.125 1.125 0 00-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 01-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 01-1.458-1.137l1.411-2.353a2.25 2.25 0 00.286-.76m11.928 9.869A9 9 0 008.965 3.525m11.928 9.868A9 9 0 118.965 3.525" />
            </svg>
        </button>
        <div v-if="isLoading">
            <div class="fixed top-0 right-0 bottom-0 left-0 w-full h-full backdrop-blur-sm z-30 rounded-[10px] flex items-center justify-center">
                <span class="relative inset-0 inline-flex h-16 w-16 animate-spin items-center justify-center rounded-full border-2 border-gray-300 after:absolute after:h-20 after:w-20 after:rounded-full after:border-2 after:border-y-indigo-500 after:border-x-transparent"></span>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: { collectionId: { required: true }},
        data: () => ({
            isLoading: false
        }),
        methods: {
            async publishCollection() {
                this.isLoading = true;

                try {
                    let response = await axios.post(`/api/publish/collections/${this.collectionId}`);

                    this.$root.$emit('new_message', {
                        responseType: "success",
                        response: response.data.message,
                        hasResponse: true
                    });
                } catch (error) {
                    this.$root.$emit('new_message', {
                        responseType: "error",
                        response: "Publish collection failed",
                        hasResponse: true
                    });
                }

                this.isLoading = false;
            }
        }
    }
</script>
