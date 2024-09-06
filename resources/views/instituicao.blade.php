@extends('layouts.app')

@section('title', 'Instituições')

@section('content')
    <div class="container m-2">
        <h2 class="text-3xl text-center font-semibold  mb-3 mt-5 relative">
            Instituições
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-80 h-1 bg-red-600"></span>
        </h2>
        <div class="flex justify-center">
            <div id="map" style="height: 400px; width: 70%;"></div>
            <div class="ml-5 ">
                <button class="border rounded-lg shadow-lg p-5 text-center hover:bg-gray-100 transition duration-300 flex"
                    id="hemonucleo">
                    <img src="{{ asset('img/hmcc.png') }}"class="w-10 h-10 w-28 object-contain" />
                    <h3 class="text-xl font-semibold ">Hemonúcleo de Foz do Iguaçu</h3>
                </button>
                <button
                    class="border rounded-lg shadow-lg p-5 mt-3 text-center hover:bg-gray-100 transition duration-300 flex"
                    id="hemocentro">
                    <img src="{{ asset('img/cascavel.png') }}" class="w-12 h-12 w-28 object-contain" />
                    <h3 class="text-xl font-semibold ">Hemocentro Regional De Cascavel</h3>
                </button>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
                d[l](f, ...n))
        })({
            key: "#",
            v: "weekly",

        });
    </script>
    <script>
        let map;

        async function initMap() {
            const initialPosition = {
                lat: -25.498405,
                lng: -54.5705818
            };

            const {
                Map
            } = await google.maps.importLibrary("maps");
            const {
                AdvancedMarkerElement
            } = await google.maps.importLibrary("marker");

            map = new Map(document.getElementById("map"), {
                zoom: 18,
                center: initialPosition,
                mapId: "DEMO_MAP_ID",
            });

            const marker = new AdvancedMarkerElement({
                map: map,
                position: initialPosition,
                title: "Hemonúcleo de Foz do Iguaçu",
            });

            document.getElementById("hemonucleo").addEventListener("click", () => {
                const position = {
                    lat: -25.498405,
                    lng: -54.5705818
                };
                map.setCenter(position);
                marker.position = position;
                marker.title = "Hemonúcleo de Foz do Iguaçu";
            });

            document.getElementById("hemocentro").addEventListener("click", () => {
                const position = {
                    lat: -24.9736895,
                    lng: -53.4957743
                };
                map.setCenter(position);
                marker.position = position;
                marker.title = "Hemocentro Regional De Cascavel";
            });
        }

        initMap();
    </script>
@endsection
