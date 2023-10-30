

<div id="device_index" wire:poll.1000ms>

    <div class="devices_list">
            @foreach ($devices as $device)
                <div class="machine">
                        <img src='/assets/machine.png' alt="">
                <div class="details">
                    <span class="{{$device->active ? 'status active':'status'}}">{{$device->active?'Active':'Out of order'}}</span>
                    <span class="counter">Available Cups: <span><b>{{$device->cup_count}}</b>/{{$device->capacity}}</span></span>
                </div>
                
                <a class="manage"  wire:navigate href="/device/{{$device->id}}/manage">Device Management</a>
                
                
                @if($device->isEmpty())
                    <span class="empty">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                        No cups available
                    </span>
                
                @endif
                @if($device->stored==2 )
                    <span class="full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                        Storage full
                    </span>
                @else
                    <span class="storage">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />                        
                        </svg>
                        Stored cups: {{$device->stored}}
                    </span>
                @endif
                <span class="location">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                    
                {{$device->location}}</span>
                
                </div>

        
            @endforeach

            <div class="add_machine">
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3>Add a machine</h3>
                </a>
                    

            </div>
            
    </div>  
    <div class="stats">
    
        <div class="stat_block" id="cup_stats">
                    <h3>Total Cups: <span>{{$stats['totalCups']}}</span></h3>
                    <h3>Borrowed: <span>{{$stats['borrowedCups']}}</span></h3>
                    <h3>
                    
                    @if($stats['emptyDevices'])
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                    </svg>
                    @endif
  Empty devices: <span>{{$stats['emptyDevices']}}</span></h3>
        </div>
    
    </div>          
</div>