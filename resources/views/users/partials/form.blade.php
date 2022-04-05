<input type="hidden" value="{{ csrf_token() }}" name="_token">
<input type="text" placeholder="Nome:" name="name" required value="{{ $user->name ?? old('name') }}">
<input type="email" placeholder="E-mail:" name="email" required value="{{ $user->email ?? old('email') }}">
<input type="password" placeholder="Senha:" name="password" required>
<button type="submit">Enviar</button>
