<x-app-layout>
    <x-slot name="header">
       <div style="display: grid; grid-template-columns: repeat(5, auto);  grid-column-gap: 4px">
           <div class="col-start-2 col-span-1 flex justify-center w-auto mt-5">
               <img src="{{$profile->profile_photo_url}}" alt="{{ $profile->username }}" class="w-40 h-40 rounded-full">
           </div>
           <div style="grid-column-start: 3; column-span: 2; display: flex; justify-content: flex-start; align-items: center; width: auto; margin: 0">
                <div style="display: grid; grid-template-rows: repeat(2, auto)">
                    <div style="display: flex; flex-direction: row; align-items: center">
                        <h1 style="font-size: 1rem; font-weight: bold; margin: 14px">{{$profile->username}}</h1>
                        <a href="{{route('profile.show')}}" style="border: 2px solid gray; border-radius: 5px; padding:0px 5px ; margin: 16px; white-space: nowrap">{{__('Edit Profile')}}</a>
                        <a href="#">
                            <a href="/posts/create" style="margin-left: 8px; border: 5px solid rgb(63, 63, 63); padding: 0px 5px; background-color: rgb(63, 63, 63); border-radius: 5px; color: white">
                                {{__('Add Post')}}
                            </a>    
                        </a>
                    </div>

                    <div>
                        <ul style="display: flex; flex-direction: row; margin-bottom: 5px">
                            <li style="margin: 10px; cursor: pointer;"><span style="padding-right: 5px" class="font-semibold">15</span>{{__('posts')}}</li>
                            <li style="margin: 10px;"><a href="#"> <span style="padding-right: 5px;" class="font-semibold">50</span>{{__('followers')}}</li></a>
                            <li style="margin: 10px;"><a href="#"> <span style="padding-right: 5px" class="font-semibold">30</span>{{__('followers')}}</li></a>
                        </ul>

                        <p style="margin-bottom: 1px; color: black">{{ $profile->name }}</p>
                        <p>{{ $profile->bio }}</p>
                        <p style="color: rgba(14, 96, 219, 0.884);"> <a href="{{ $profile->url }}">{{$profile->url}}</a> </p>
                    </div>
                </div>
           </div>
       </div>
    </x-slot>

    <div class="max-w-4xl my-0 mx-auto">
        <hr style="margin-top: 40px" class="mb-10 w-full h-full">
        <div style="margin: 20px; display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); grid-column-gap: 10px; grid-row-gap: 10px " class="posts">
            <div class="post" style="position: relative">
                <a href="#">
                    <img style="height: max-content; width: max-content;" src="{{asset('logo.png')}}" alt="logo" class="">
                </a>
                <div class="icons" style="color: white; width: 100%; display: flex; justify-content: space-evenly; position: absolute; bottom: 50%;">
                    <a href="#!">  <i class="fas fa-heart mr-2"></i><span style="margin-left: 10px">22</span></a>
                    <a href="#!"> <i style="color: black" class="fas fa-comment mr-2"></i><span style="margin-left: 10px; color: black">33</span></a>
                </div>
            </div>
            <div class="post" style="position: relative">
                <a href="#">
                    <img style="height: max-content; width: max-content;" src="{{asset('logo.png')}}" alt="logo" class="">
                </a>
                <div class="icons" style="color: white; width: 100%; display: flex; justify-content: space-evenly; position: absolute; bottom: 50%;">
                    <a href="#!">  <i class="fas fa-heart mr-2"></i><span style="margin-left: 10px">22</span></a>
                    <a href="#!"> <i style="color: black" class="fas fa-comment mr-2"></i><span style="margin-left: 10px; color: black">33</span></a>
                </div>
            </div>
            <div class="post" style="position: relative">
                <a href="#">
                    <img style="height: max-content; width: max-content;" src="{{asset('logo.png')}}" alt="logo" class="">
                </a>
                <div class="icons" style="color: white; width: 100%; display: flex; justify-content: space-evenly; position: absolute; bottom: 50%;">
                    <a href="#!">  <i class="fas fa-heart mr-2"></i><span style="margin-left: 10px">22</span></a>
                    <a href="#!"> <i style="color: black" class="fas fa-comment mr-2"></i><span style="margin-left: 10px; color: black">33</span></a>
                </div>
            </div>
        </div>
        
    </div>
    
</x-app-layout>