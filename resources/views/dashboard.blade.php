<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta content='yes' name='mobile-web-app-capable'/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Site Title</title>
    <link rel="manifest" href="manifest.json" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <v-app>
            <v-layout>
                <v-row>
                    <v-col cols="12">
                        <app-header></app-header>
                    </v-col>
                </v-row>
        
                <v-row>
                    <v-col cols="12">
                        <v-main class="d-flex align-center justify-center">
                            <v-container>
                                <v-card flat style="height: 100vh; width: 100vw; overflow-y: auto;">
                                    <v-btn elevation="4" fab icon color="#2d4d22" large class="text-white"
                                        style="position: fixed !important; right: 2em !important; bottom: 5em !important; z-index: 99;">
                                        <v-icon>mdi-access-point</v-icon>
                                    </v-btn>
                                    <router-view></router-view>
                                </v-card>
                            </v-container>
                        </v-main>
                    </v-col>
                </v-row>
            </v-layout>
        </v-app>
    </div>

    <!-- scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
    </script>

</body>
</html>