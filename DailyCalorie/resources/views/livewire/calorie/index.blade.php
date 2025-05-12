<div>
    <a href="{{ route('calorie.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">CALORIE</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calories as $calorie)
            <tr>
                <td>{{ $calorie->name }}</td>
                <td>{{ $calorie->calorie }}</td>
                <td class="text-center">
                    <a href="{{ route('calorie.edit', $calorie->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button wire:click="destroy({{ $calorie->id }})" class="btn btn-sm btn-danger">DELETE</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $calories->links() }}
</div>