<x-app-layout>
    <x-errores/>

    <div class="w-full max-w-sm mx-auto">
        <form action="{{ route("login") }}" method="post" class="card bg-base-200 p-6 shadow">
            @csrf
            <label class="floating-label"for="email">
                <span>Email</span>
                <input class="input input-md" type="email" id="email" name="email" value="{{ old('email') }}"><br>
            </label>

            <label class="floating-label"for="password">
                <span>Contraseña</span>
                <input class="input input-md" type="password" id="password" name="password"><br>
            </label>
            <div class="flex-2">
                <button class="btn btn-soft btn-success" type="submit">Iniciar sesión</button>
            </div>
        </form>
    </div>

</x-app-layout>
