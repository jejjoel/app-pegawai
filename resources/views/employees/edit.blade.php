<h2>Edit Data Pegawai</h2>
<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td>Nama Lengkap</td>
            <td><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value="{{ old('email', $employee->email) }}"></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td><input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" value="{{ old('alamat', $employee->alamat) }}"></td>
        </tr>
        <tr>
            <td>Tanggal Masuk</td>
            <td><input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="status">
                    <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak aktif" {{ old('status', $employee->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak

                        Aktif</option>

                </select>
            </td>
        </tr>
        <tr>
        <tr>
            <td><label for="departemen_id">Departemen:</label></td>
            <td>
                <select id="departemen_id" name="departemen_id" required>
                    <option value="">-- Pilih Departemen --</option>
                    @foreach($departments as $dept)
                    <option value="{{ $dept->id }}"
                        {{ old('departemen_id', $employee->departemen_id) == $dept->id ? 'selected' : '' }}>
                        {{ $dept->nama_departemen }}
                    </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="jabatan_id">Jabatan:</label></td>
            <td>
                <select id="jabatan_id" name="jabatan_id" required>
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach($positions as $pos)
                    <option value="{{ $pos->id }}"
                        {{ old('jabatan_id', $employee->jabatan_id) == $pos->id ? 'selected' : '' }}>
                        {{ $pos->nama_jabatan }}
                    </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <td colspan="2">
            <button type="submit">Update</button>
        </td>
        </tr>
    </table>
</form>