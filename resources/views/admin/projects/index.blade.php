<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Projects') }}
            </h2>
            <a href="{{route('admin.projects.create')}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse($projects as $project)
                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($project->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ htmlspecialchars($project->name) }}</h3>
                            <p class="text-slate-500 text-sm">{{ htmlspecialchars(optional($project->category)->name ?? 'No Category') }}</p>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Budget</p>
                        <h3 class="text-indigo-950 text-xl font-bold">Rp {{ number_format($project->budget,0,',','.') }}</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Applicants</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $project->applicants->count() }}</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Client</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ htmlspecialchars(optional($project->owner)->name ?? 'No Owner') }}</h3>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Status</p>
                        
                        @if($project->status == 'Finished')
                        <h3 class="text-green-600 text-xl font-bold">Finished</h3>
                        @elseif($project->status == 'In Progress')
                            <h3 class="text-yellow-500 text-xl font-bold">In Progress</h3>
                        @elseif($project->applicants->count() > 0 && $project->status == 'Not Yet Applied')
                            <h3 class="text-orange-500 text-xl font-bold">Waiting for Approval</h3>
                        @elseif($project->applicants->count() == 0 && $project->status == 'Not Yet Applied')
                            <h3 class="text-indigo-950 text-xl font-bold">Not Yet Applied</h3>
                        @else
                            <h3 class="text-red-500 text-xl font-bold">Unknown Status</h3>
                        @endif
                    </div>
                    
            
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.projects.show', $project) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Manage
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-slate-500 text-sm">Belum ada data project terbaru</p>
            @endforelse
            

                
            </div>
        </div>
    </div>
</x-app-layout>
