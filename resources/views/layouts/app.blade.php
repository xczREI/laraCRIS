<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laraCRIS - Local Civil Registry</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800 antialiased overflow-hidden">

    <div class="flex h-screen w-full">

        <aside class="w-64 bg-blue-900 text-white flex flex-col shadow-xl">
            <div class="p-6 text-center border-b border-blue-800">
                <h1 class="text-2xl font-bold tracking-wider">laraCRIS</h1>
                <p class="text-sm text-blue-300 mt-1">Gerona Registry</p>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-blue-800 transition">📊 Dashboard</a>

                <div class="pt-4 pb-1 text-xs text-blue-400 font-bold uppercase tracking-wider">Registries</div>
                <a href="{{ route('births.index') }}" class="block px-4 py-3 bg-blue-800 rounded-lg shadow-inner font-semibold border-l-4 border-blue-400">👶 Birth Records</a>
                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-blue-800 transition">🕊️ Death Records</a>
                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-blue-800 transition">💍 Marriage Records</a>
                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-blue-800 transition">⚖️ Legal Instruments</a>

                <div class="pt-4 pb-1 text-xs text-blue-400 font-bold uppercase tracking-wider">System</div>
                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-blue-800 transition">👥 Users & Staff</a>
                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-blue-800 transition">⚙️ Settings</a>
            </nav>

            <div class="p-4 border-t border-blue-800">
                <a href="#" class="block px-4 py-2 text-center text-sm text-blue-200 hover:text-white transition">Logout</a>
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-screen overflow-y-auto">
            <header class="bg-white shadow-sm py-4 px-8 flex justify-between items-center border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-700">@yield('header', 'Overview')</h2>
                <div class="flex items-center text-sm font-medium text-gray-600">
                    <span>Logged in as: Super Admin</span>
                </div>
            </header>

            <div class="p-8 w-full">
                @yield('content')
            </div>
        </main>

    </div>
</body>
</html>
