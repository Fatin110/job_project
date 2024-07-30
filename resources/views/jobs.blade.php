<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    @foreach ($jobs as $job)
        <a href="/jobs/{{$job['id']}}">
            <li><strong>{{ $job['title'] }}</strong>: {{ $job['salary'] }}</li>
        </a>
    @endforeach

</x-layout>
