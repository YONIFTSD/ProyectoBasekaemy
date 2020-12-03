<div class="ms-panel ms-panel-fh">
    <div class="ms-panel-body">
        <h2 class="section-title">Información básica</h2>
        <table class="table ms-profile-information">
            <tbody>
                <tr>
                    <th scope="row">Nombre</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Apellido</th>
                    <td>{{ $user->last_name }}</td>
                </tr>
                <tr>
                    <th scope="row">Celular</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>