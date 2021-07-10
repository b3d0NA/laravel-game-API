@extends("layouts.app")
@section("title", "Agregation")
@section("content")
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
        <livewire:popular-games>
        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-reviewed w-full mr-0 lg:w-3/4 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>
                <livewire:recently-reviewed>
            </div>
            <div class="most-reviewed lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recent Top Rated</h2>
               <livewire:most-anticipated>

                <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-28">Coming Soon</h2>
                <livewire:coming-soon>
            </div>
        </div>
    </div> <!-- End container -->


@endsection
