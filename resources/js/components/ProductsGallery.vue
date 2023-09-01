<template>
    <div>
    <v-row>
        <v-col cols="12">
            <!-- <v-container fluid> -->
                <v-sheet class="mx-auto">
                    <v-slide-group show-arrows class="pa-4">
                        <v-slide-group-item v-for="item in products" :key="item.id">
                            <v-card class="mx-auto my-4" height="300" width="300" flat>
                                <v-img cover :src="item.path" :lazy-src="'/img/placeholder/jk-placeholder-image-300x203.jpg'" class="ma-3" height="200"></v-img>
                                <v-card-text class="text-center">
                                    <p style="color: #2d4d22; font-weight: bold;">{{ item.basket_item_name }}</p>
                                </v-card-text>
                            </v-card>
                        </v-slide-group-item>
                    </v-slide-group>
                </v-sheet>
            <!-- </v-container> -->
        </v-col>
    </v-row>
    <v-row>
        <v-expansion-panels>
            <v-expansion-panel>
                <v-expansion-panel-title><p class="see-more">Click to see all</p></v-expansion-panel-title>
                <v-expansion-panel-text>
                    <v-row class="justify-center">
                        <v-col v-for="item in products"
                            :key="item.id"
                            cols="4"
                            md="4"
                            lg="2"
                            xl="2">
                            <v-card class="mx-auto my-4" max-height="400" max-width="400" flat>
                                <!-- >600px viewport -->
                                <v-img cover :src="item.path" 
                                    :lazy-src="'/img/placeholder/jk-placeholder-image-300x203.jpg'" 
                                    height="100" 
                                    class="ma-3 rounded-circle d-none d-sm-flex">
                                </v-img>
                                <!-- mobile, <600px viewport --> 
                                <v-img cover :src="item.path" 
                                    :lazy-src="'/img/placeholder/jk-placeholder-image-300x203.jpg'" 
                                    height="50" 
                                    width="50"
                                    class="ma-2 rounded-circle d-flex d-sm-none">
                                </v-img>
                                <v-card-text>
                                    <p style="color: #2d4d22; text-align: center; font-size: 11px;">{{ item.basket_item_name }}</p>
                                </v-card-text>
                            </v-card>
                        </v-col>
                    </v-row>
                    
                </v-expansion-panel-text>
            </v-expansion-panel>
        </v-expansion-panels>
    </v-row>
        
        <!-- see all here  -->
        <!-- <v-col
            v-for="item in products"
            :key="item.id"
            cols="12"
            md="4"
            lg="4"
            xl="4">
            <v-hover v-slot="{ isHovering, props }">
                <v-card class="mx-auto" color="grey-lighten-4" max-width="600" v-bind="props">
                    <v-img height="200px" cover src="https://cdn.vuetifyjs.com/images/cards/kitchen.png">
                        <v-expand-transition>
                            <div
                                v-if="isHovering"
                                class="d-flex transition-fast-in-fast-out bg-orange-darken-2 v-card--reveal text-h2"
                                style="height: 100%;"
                            >
                            {{ item.basket_item_name }}
                            </div>
                        </v-expand-transition>
                        
                    </v-img>

                    <v-card-text class="pt-6">
                        <div class="font-weight-light text-grey text-h6 mb-2">
                            {{item.category }}
                        </div>

                        <h3 class="text-h4 font-weight-light text-orange mb-2">
                            {{item.created_at }}
                        </h3>

                        <div class="font-weight-light text-h6 mb-2">
                            Details
                        </div>
                    </v-card-text>
                </v-card>
            </v-hover>
        </v-col> -->
    <!-- </v-row> -->
    </div>
</template>

<script>
    export default {
        props: {
            products: Array,
            category: String
        }
    }
</script>

<style scoped>
    .see-more {
        font-size: 28px;
        font-weight: 500;
        font-style: italic;
        font-family: 'Gelasio', serif;
        color: #2d4d22;
    }
</style>