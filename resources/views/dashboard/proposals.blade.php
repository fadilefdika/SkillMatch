<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Proposals') }}
            </h2>
        </div> 
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse(Auth::user()->proposals as $proposal)
                    <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{Storage::url($proposal->project->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">{{$proposal->project->name}}</h3>
                                <p class="text-slate-500 text-sm">{{$proposal->project->category->name}}</p>
                            </div>
                        </div>

                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Budget</p>
                            <h3 class="text-indigo-950 text-xl font-bold">Rp {{number_format($proposal->project->budget,0,',','.')}}</h3>
                        </div>

                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Applied at</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{$proposal->created_at->format('d F Y')}}</h3>
                        </div>
                        
                        <div>
                            <p class="text-slate-500 text-sm mb-2">Status</p>
                            @php
                                $applicant = $proposal->project->applicants->where('freelancer_id', auth()->id())->first();
                            @endphp
                            
                            @if($applicant && $applicant->status == 'Hired')
                                <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                    YOU'RE HIRED
                                </span>
                            @elseif($applicant && $applicant->status == 'Waiting')
                                <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                    WAITING FOR APPROVAL
                                </span> 
                            @elseif($applicant && $applicant->status == 'Rejected')
                                <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-red-500 text-white">
                                    REJECTED
                                </span> 
                            @endif
                        </div>

                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{route('dashboard.proposal_details',[$proposal->project, $proposal->id])}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-indigo-950 text-xl font-bold">Anda belum mengirimkan sebuah proposal</p>
                @endforelse



                
            </div>
        </div>
    </div>
</x-app-layout>
