@extends('Front-office.partials.Reservation._tags_html')
@section('content')
<div id="homeImg">
    @extends('Front-office.partials.Home._Header')
</div>

<section id="reservationBlock">
    <div class="container">
        <div class="view-content" >
            <div class="addon-content">
                @if (session()->has("error"))
                <div>
                    <p class="badge p-3 text-bg-danger text-capitalize w-38">{{$message}}</p>
                </div>
                @endif
                <div class="addon-selection">
                    <div class="addon-selection-label" onclick="showTrainsSeats()">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="transform: rotate(0deg)">
                                <g fill="skyblue">
                                    <circle cx="11" cy="4" r="2"></circle>
                                    <path d="M16,11H13a1,1,0,0,1-1-1V8H10v2a3,3,0,0,0,3,3h3Z"></path>
                                    <path d="M11,17h3.56a1,1,0,0,1,.95.68l1.54,4.64,1.9-.64L17.4,17.05A3,3,0,0,0,14.56,15H8.9L8,6.89,6,7.11,7.1,17Z"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="addon-title">Choix de place (Your Default Place:  {{$default_place}})</div>
                        <div class="secondary-icon icon">
                            <div class="secondary-icon icon" style="color: skyblue;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="skyblue" xmlns="http://www.w3.org/2000/svg" class="" style="transform: rotate(270deg)">
                                    <path d="M4.29 9.29C4.10069 9.47777 3.9942 9.73336 3.9942 10C3.9942 10.2666 4.10069 10.5222 4.29 10.71L11.29 17.71C11.4778 17.8993 11.7334 18.0058 12 18.0058C12.2666 18.0058 12.5222 17.8993 12.71 17.71L19.71 10.71C19.9637 10.4563 20.0627 10.0866 19.9699 9.74012C19.877 9.39362 19.6064 9.12297 19.2599 9.03012C18.9134 8.93728 18.5437 9.03634 18.29 9.29L12 15.59L5.71 9.29C5.52223 9.10069 5.26664 8.9942 5 8.9942C4.73336 8.9942 4.47777 9.10069 4.29 9.29Z" fill="skyblue"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="train hide-train">
                        <div class="d-flex justify-content-center mb-3" onclick="displayClasses(event)">
                            <button class="active border-0 me-3 rounded-2 w-15" data-class="1">Classe 1</button>
                            <button class="border-0 me-3 rounded-2 w-15" data-class="2">Classe 2</button>
                            <button class="w-15 border-0 rounded-2" data-class="3"> Classe 3</button>
                        </div>
                        <div class="d-flex contai">
                                {{-- class 1 --}}
                            <div class="cart ms">
                                <div class="d-flex" onclick="chooseSeate(event)">
                                    @php
                                        $count = 1;
                                    @endphp
                                    @for($i = 0 ; $i < 5 ; $i++)
                                    <div class="classe-1">
                                        @for ($j = 0; $j < 4; $j++)
                                        @php
                                            $color = 'white';
                                            $color2 = 'white';
                                            if (in_array($count , $Ordered_Places)) $color = 'gray';
                                            if ($count == $default_place) $color = 'skyBlue';

                                            if (in_array($count+1 , $Ordered_Places)) $color2 = 'gray';
                                            if ($count+1 == $default_place) $color2 = 'skyBlue';
                                        @endphp
                                        <div class="rows">
                                            <div class="seat ms">
                                                <div class="seat available">
                                                    <div class="seat-label ">
                                                        <div class="seat">
                                                            <div class="seat-number" data-color="{{$color}}">{{$count}}</div>
                                                            <div class="icon">
                                                                <svg viewBox="0 0 40 40" width="40" height="40" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(90deg)">
                                                                    <path d="M39.097 8.29c-.316-.22-.773-.336-2.21-.368V5.677C36.887 2.55 34.242 0 31 0H8.969C5.725 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A1.993 1.993 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.056 2.056 0 00-.903-1.668z" fill="{{$color}}"></path>
                                                                    <path d="M39.097 8.28c-.316-.221-.773-.337-2.21-.358V5.677C36.887 2.539 34.242 0 31 0H8.969C5.714 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A2.038 2.038 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.09 2.09 0 00-.903-1.679zM4.157 5.676c0-2.55 2.156-4.628 4.8-4.628h22.03c2.646 0 4.8 2.078 4.8 4.628v2.245h-.043c-.076 0-.13 0-.207.01-.087 0-.185.011-.26.011-.055 0-.11.01-.164.01-.076.011-.152.011-.218.022-.043 0-.087.01-.13.01-.066.01-.12.021-.175.021-.032.01-.076.01-.108.021-.055.01-.098.021-.142.032-.033.01-.054.01-.087.02-.044.011-.076.022-.109.032-.022.01-.043.01-.065.021-.033.01-.065.032-.098.042-.01.01-.033.01-.044.021a.964.964 0 00-.108.063 2.123 2.123 0 00-.654.693c-.174.304-.272.64-.272.986v17.996c0 1.574-.947 3.116-2.59 4.229-1.371.934-3.581 1.794-10.34 1.794-7.01 0-9.948-1.249-11.178-2.288-1.241-1.06-1.927-2.381-1.927-3.725V9.958c0-.357-.098-.693-.272-.986a1.517 1.517 0 00-.261-.368 1.855 1.855 0 00-.305-.272L5.997 8.3a.737.737 0 00-.12-.073l-.065-.032a.33.33 0 01-.087-.042l-.098-.031c-.022-.01-.043-.01-.076-.021a1.038 1.038 0 01-.141-.042h-.022a7.144 7.144 0 00-.773-.105c-.033 0-.065-.01-.109-.01H4.17V5.676h-.011zm34.744 22.277c0 3.641-2.264 7.04-6.074 9.097-2.231 1.207-6.911 1.9-12.843 1.9-5.867 0-11.31-.934-13.54-2.309-3.407-2.109-5.366-5.278-5.366-8.688V9.958c0-.315.152-.609.402-.797.011-.01.294-.2 1.753-.2 1.708 0 2.057.137 2.122.179a.983.983 0 01.425.808v17.995c0 1.648.816 3.253 2.296 4.512 1.992 1.69 5.997 2.55 11.897 2.55 7.075 0 9.447-.955 10.971-1.983 1.938-1.312 3.059-3.169 3.059-5.09V9.959c0-.336.163-.64.446-.818.044-.032.348-.168 1.829-.168 1.6 0 2.078.094 2.187.178a.999.999 0 01.436.819v17.985z" fill="#1A4881"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="seat ms">
                                                <div class="seat available">
                                                    <div class="seat-label">
                                                        <div class="seat">
                                                            <div class="seat-number" data-color="{{$color2}}">{{$count+1}}</div>
                                                            <div class="icon">
                                                                <svg viewBox="0 0 40 40" width="40" height="40" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(-90deg)">
                                                                    <path d="M39.097 8.29c-.316-.22-.773-.336-2.21-.368V5.677C36.887 2.55 34.242 0 31 0H8.969C5.725 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A1.993 1.993 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.056 2.056 0 00-.903-1.668z" fill="{{$color2}}"></path>
                                                                    <path d="M39.097 8.28c-.316-.221-.773-.337-2.21-.358V5.677C36.887 2.539 34.242 0 31 0H8.969C5.714 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A2.038 2.038 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.09 2.09 0 00-.903-1.679zM4.157 5.676c0-2.55 2.156-4.628 4.8-4.628h22.03c2.646 0 4.8 2.078 4.8 4.628v2.245h-.043c-.076 0-.13 0-.207.01-.087 0-.185.011-.26.011-.055 0-.11.01-.164.01-.076.011-.152.011-.218.022-.043 0-.087.01-.13.01-.066.01-.12.021-.175.021-.032.01-.076.01-.108.021-.055.01-.098.021-.142.032-.033.01-.054.01-.087.02-.044.011-.076.022-.109.032-.022.01-.043.01-.065.021-.033.01-.065.032-.098.042-.01.01-.033.01-.044.021a.964.964 0 00-.108.063 2.123 2.123 0 00-.654.693c-.174.304-.272.64-.272.986v17.996c0 1.574-.947 3.116-2.59 4.229-1.371.934-3.581 1.794-10.34 1.794-7.01 0-9.948-1.249-11.178-2.288-1.241-1.06-1.927-2.381-1.927-3.725V9.958c0-.357-.098-.693-.272-.986a1.517 1.517 0 00-.261-.368 1.855 1.855 0 00-.305-.272L5.997 8.3a.737.737 0 00-.12-.073l-.065-.032a.33.33 0 01-.087-.042l-.098-.031c-.022-.01-.043-.01-.076-.021a1.038 1.038 0 01-.141-.042h-.022a7.144 7.144 0 00-.773-.105c-.033 0-.065-.01-.109-.01H4.17V5.676h-.011zm34.744 22.277c0 3.641-2.264 7.04-6.074 9.097-2.231 1.207-6.911 1.9-12.843 1.9-5.867 0-11.31-.934-13.54-2.309-3.407-2.109-5.366-5.278-5.366-8.688V9.958c0-.315.152-.609.402-.797.011-.01.294-.2 1.753-.2 1.708 0 2.057.137 2.122.179a.983.983 0 01.425.808v17.995c0 1.648.816 3.253 2.296 4.512 1.992 1.69 5.997 2.55 11.897 2.55 7.075 0 9.447-.955 10.971-1.983 1.938-1.312 3.059-3.169 3.059-5.09V9.959c0-.336.163-.64.446-.818.044-.032.348-.168 1.829-.168 1.6 0 2.078.094 2.187.178a.999.999 0 01.436.819v17.985z" fill="#1A4881"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($j == 1)   
                                        <div class="seat"><div class="icon"></div></div>
                                        <div class="seat"><div class="icon"></div></div>
                                        @endif
                                        @php
                                            $count +=2 ;   
                                        @endphp
                                        @endfor
                                    </div>
                                    @if ($i !== 4)   
                                    <hr class="separt" />
                                @endif
                                    
                                    @endfor
                                </div>
                            </div>

                            <div class="Iron-chain">
                                <img src="/assets/img/icons8-chain-intermediate-50.png" alt="" style="
                                transform: rotate(90deg);"
                            >
                            </div>

                                {{-- class 2  --}}
                            <div class="cart show_carts">
                                <div class="d-flex" onclick="chooseSeate(event)">
                                    @php
                                        $count = 51;
                                    @endphp
                                    @for($i = 0 ; $i < 5 ; $i++)
                                    <div class="classe-1">
                                        @for ($j = 0; $j < 5; $j++)
                                        @php
                                            $color = 'white';
                                            $color2 = 'white';
                                            if (in_array($count , $Ordered_Places)) $color = 'gray';
                                            if ($count == $default_place) $color = 'skyBlue';

                                            if (in_array($count+1 , $Ordered_Places)) $color2 = 'gray';
                                            if ($count+1 == $default_place) $color2 = 'skyBlue';
                                        @endphp
                                        <div class="rows">
                                            <div class="seat ms">
                                                <div class="seat available">
                                                    <div class="seat-label ">
                                                        <div class="seat">
                                                            <div class="seat-number" data-color="{{$color}}">{{$count}}</div>
                                                            <div class="icon">
                                                                <svg viewBox="0 0 40 40" width="40" height="40" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(90deg)">
                                                                    <path d="M39.097 8.29c-.316-.22-.773-.336-2.21-.368V5.677C36.887 2.55 34.242 0 31 0H8.969C5.725 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A1.993 1.993 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.056 2.056 0 00-.903-1.668z" fill="{{$color}}"></path>
                                                                    <path d="M39.097 8.28c-.316-.221-.773-.337-2.21-.358V5.677C36.887 2.539 34.242 0 31 0H8.969C5.714 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A2.038 2.038 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.09 2.09 0 00-.903-1.679zM4.157 5.676c0-2.55 2.156-4.628 4.8-4.628h22.03c2.646 0 4.8 2.078 4.8 4.628v2.245h-.043c-.076 0-.13 0-.207.01-.087 0-.185.011-.26.011-.055 0-.11.01-.164.01-.076.011-.152.011-.218.022-.043 0-.087.01-.13.01-.066.01-.12.021-.175.021-.032.01-.076.01-.108.021-.055.01-.098.021-.142.032-.033.01-.054.01-.087.02-.044.011-.076.022-.109.032-.022.01-.043.01-.065.021-.033.01-.065.032-.098.042-.01.01-.033.01-.044.021a.964.964 0 00-.108.063 2.123 2.123 0 00-.654.693c-.174.304-.272.64-.272.986v17.996c0 1.574-.947 3.116-2.59 4.229-1.371.934-3.581 1.794-10.34 1.794-7.01 0-9.948-1.249-11.178-2.288-1.241-1.06-1.927-2.381-1.927-3.725V9.958c0-.357-.098-.693-.272-.986a1.517 1.517 0 00-.261-.368 1.855 1.855 0 00-.305-.272L5.997 8.3a.737.737 0 00-.12-.073l-.065-.032a.33.33 0 01-.087-.042l-.098-.031c-.022-.01-.043-.01-.076-.021a1.038 1.038 0 01-.141-.042h-.022a7.144 7.144 0 00-.773-.105c-.033 0-.065-.01-.109-.01H4.17V5.676h-.011zm34.744 22.277c0 3.641-2.264 7.04-6.074 9.097-2.231 1.207-6.911 1.9-12.843 1.9-5.867 0-11.31-.934-13.54-2.309-3.407-2.109-5.366-5.278-5.366-8.688V9.958c0-.315.152-.609.402-.797.011-.01.294-.2 1.753-.2 1.708 0 2.057.137 2.122.179a.983.983 0 01.425.808v17.995c0 1.648.816 3.253 2.296 4.512 1.992 1.69 5.997 2.55 11.897 2.55 7.075 0 9.447-.955 10.971-1.983 1.938-1.312 3.059-3.169 3.059-5.09V9.959c0-.336.163-.64.446-.818.044-.032.348-.168 1.829-.168 1.6 0 2.078.094 2.187.178a.999.999 0 01.436.819v17.985z" fill="#1A4881"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="seat ms">
                                                <div class="seat available">
                                                    <div class="seat-label">
                                                        <div class="seat">
                                                            <div class="seat-number" data-color="{{$color2}}">{{$count+1}}</div>
                                                            <div class="icon">
                                                                <svg viewBox="0 0 40 40" width="40" height="40" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(-90deg)">
                                                                    <path d="M39.097 8.29c-.316-.22-.773-.336-2.21-.368V5.677C36.887 2.55 34.242 0 31 0H8.969C5.725 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A1.993 1.993 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.056 2.056 0 00-.903-1.668z" fill="{{$color2}}"></path>
                                                                    <path d="M39.097 8.28c-.316-.221-.773-.337-2.21-.358V5.677C36.887 2.539 34.242 0 31 0H8.969C5.714 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A2.038 2.038 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.09 2.09 0 00-.903-1.679zM4.157 5.676c0-2.55 2.156-4.628 4.8-4.628h22.03c2.646 0 4.8 2.078 4.8 4.628v2.245h-.043c-.076 0-.13 0-.207.01-.087 0-.185.011-.26.011-.055 0-.11.01-.164.01-.076.011-.152.011-.218.022-.043 0-.087.01-.13.01-.066.01-.12.021-.175.021-.032.01-.076.01-.108.021-.055.01-.098.021-.142.032-.033.01-.054.01-.087.02-.044.011-.076.022-.109.032-.022.01-.043.01-.065.021-.033.01-.065.032-.098.042-.01.01-.033.01-.044.021a.964.964 0 00-.108.063 2.123 2.123 0 00-.654.693c-.174.304-.272.64-.272.986v17.996c0 1.574-.947 3.116-2.59 4.229-1.371.934-3.581 1.794-10.34 1.794-7.01 0-9.948-1.249-11.178-2.288-1.241-1.06-1.927-2.381-1.927-3.725V9.958c0-.357-.098-.693-.272-.986a1.517 1.517 0 00-.261-.368 1.855 1.855 0 00-.305-.272L5.997 8.3a.737.737 0 00-.12-.073l-.065-.032a.33.33 0 01-.087-.042l-.098-.031c-.022-.01-.043-.01-.076-.021a1.038 1.038 0 01-.141-.042h-.022a7.144 7.144 0 00-.773-.105c-.033 0-.065-.01-.109-.01H4.17V5.676h-.011zm34.744 22.277c0 3.641-2.264 7.04-6.074 9.097-2.231 1.207-6.911 1.9-12.843 1.9-5.867 0-11.31-.934-13.54-2.309-3.407-2.109-5.366-5.278-5.366-8.688V9.958c0-.315.152-.609.402-.797.011-.01.294-.2 1.753-.2 1.708 0 2.057.137 2.122.179a.983.983 0 01.425.808v17.995c0 1.648.816 3.253 2.296 4.512 1.992 1.69 5.997 2.55 11.897 2.55 7.075 0 9.447-.955 10.971-1.983 1.938-1.312 3.059-3.169 3.059-5.09V9.959c0-.336.163-.64.446-.818.044-.032.348-.168 1.829-.168 1.6 0 2.078.094 2.187.178a.999.999 0 01.436.819v17.985z" fill="#1A4881"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($j == 1)   
                                        <div class="seat"><div class="icon"></div></div>
                                        @endif
                                        @php
                                            $count +=2 ;   
                                        @endphp
                                        @endfor
                                    </div>
                                    @if ($i !== 4)   
                                    <hr class="separt" />
                                @endif
                                    
                                    @endfor
                                </div>
                            </div>

                            <div class="Iron-chain">
                                <img src="/assets/img/icons8-chain-intermediate-50.png" alt="" style="
                                transform: rotate(90deg);"
                            >
                            </div>


                                {{-- class 3 --}}
                            <div class="cart" >
                                <div class="d-flex" onclick="chooseSeate(event)">
                                    @php
                                        $count = 100;
                                    @endphp
                                    @for($i = 0 ; $i < 5 ; $i++)
                                    <div class="classe-1">
                                        @for ($j = 0; $j < 5; $j++)
                                        @php
                                            $color = 'white';
                                            $color2 = 'white';
                                            if (in_array($count , $Ordered_Places)) $color = 'gray';
                                            if ($count == $default_place) $color = 'skyBlue';

                                            if (in_array($count+1 , $Ordered_Places)) $color2 = 'gray';
                                            if ($count+1 == $default_place) $color2 = 'skyBlue';
                                        @endphp
                                        <div class="rows">
                                            <div class="seat ms">
                                                <div class="seat available">
                                                    <div class="seat-label ">
                                                        <div class="seat">
                                                            <div class="seat-number" data-color="{{$color}}">{{$count}}</div>
                                                            <div class="icon">
                                                                <svg viewBox="0 0 40 40" width="40" height="40" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(90deg)">
                                                                    <path d="M39.097 8.29c-.316-.22-.773-.336-2.21-.368V5.677C36.887 2.55 34.242 0 31 0H8.969C5.725 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A1.993 1.993 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.056 2.056 0 00-.903-1.668z" fill="{{$color}}"></path>
                                                                    <path d="M39.097 8.28c-.316-.221-.773-.337-2.21-.358V5.677C36.887 2.539 34.242 0 31 0H8.969C5.714 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A2.038 2.038 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.09 2.09 0 00-.903-1.679zM4.157 5.676c0-2.55 2.156-4.628 4.8-4.628h22.03c2.646 0 4.8 2.078 4.8 4.628v2.245h-.043c-.076 0-.13 0-.207.01-.087 0-.185.011-.26.011-.055 0-.11.01-.164.01-.076.011-.152.011-.218.022-.043 0-.087.01-.13.01-.066.01-.12.021-.175.021-.032.01-.076.01-.108.021-.055.01-.098.021-.142.032-.033.01-.054.01-.087.02-.044.011-.076.022-.109.032-.022.01-.043.01-.065.021-.033.01-.065.032-.098.042-.01.01-.033.01-.044.021a.964.964 0 00-.108.063 2.123 2.123 0 00-.654.693c-.174.304-.272.64-.272.986v17.996c0 1.574-.947 3.116-2.59 4.229-1.371.934-3.581 1.794-10.34 1.794-7.01 0-9.948-1.249-11.178-2.288-1.241-1.06-1.927-2.381-1.927-3.725V9.958c0-.357-.098-.693-.272-.986a1.517 1.517 0 00-.261-.368 1.855 1.855 0 00-.305-.272L5.997 8.3a.737.737 0 00-.12-.073l-.065-.032a.33.33 0 01-.087-.042l-.098-.031c-.022-.01-.043-.01-.076-.021a1.038 1.038 0 01-.141-.042h-.022a7.144 7.144 0 00-.773-.105c-.033 0-.065-.01-.109-.01H4.17V5.676h-.011zm34.744 22.277c0 3.641-2.264 7.04-6.074 9.097-2.231 1.207-6.911 1.9-12.843 1.9-5.867 0-11.31-.934-13.54-2.309-3.407-2.109-5.366-5.278-5.366-8.688V9.958c0-.315.152-.609.402-.797.011-.01.294-.2 1.753-.2 1.708 0 2.057.137 2.122.179a.983.983 0 01.425.808v17.995c0 1.648.816 3.253 2.296 4.512 1.992 1.69 5.997 2.55 11.897 2.55 7.075 0 9.447-.955 10.971-1.983 1.938-1.312 3.059-3.169 3.059-5.09V9.959c0-.336.163-.64.446-.818.044-.032.348-.168 1.829-.168 1.6 0 2.078.094 2.187.178a.999.999 0 01.436.819v17.985z" fill="#1A4881"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="seat ms">
                                                <div class="seat available">
                                                    <div class="seat-label">
                                                        <div class="seat">
                                                            <div class="seat-number" data-color="{{$color2}}">{{$count+1}}</div>
                                                            <div class="icon">
                                                                <svg viewBox="0 0 40 40" width="40" height="40" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(-90deg)">
                                                                    <path d="M39.097 8.29c-.316-.22-.773-.336-2.21-.368V5.677C36.887 2.55 34.242 0 31 0H8.969C5.725 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A1.993 1.993 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.056 2.056 0 00-.903-1.668z" fill="{{$color2}}"></path>
                                                                    <path d="M39.097 8.28c-.316-.221-.773-.337-2.21-.358V5.677C36.887 2.539 34.242 0 31 0H8.969C5.714 0 3.08 2.55 3.08 5.677v2.245c-1.513.01-2.002.22-2.253.41A2.038 2.038 0 000 9.958v17.996c0 3.777 2.133 7.272 5.867 9.57C8.26 39.004 13.943 40 19.995 40c6.193 0 10.95-.724 13.376-2.036C37.518 35.72 40 31.973 40 27.954V9.958a2.09 2.09 0 00-.903-1.679zM4.157 5.676c0-2.55 2.156-4.628 4.8-4.628h22.03c2.646 0 4.8 2.078 4.8 4.628v2.245h-.043c-.076 0-.13 0-.207.01-.087 0-.185.011-.26.011-.055 0-.11.01-.164.01-.076.011-.152.011-.218.022-.043 0-.087.01-.13.01-.066.01-.12.021-.175.021-.032.01-.076.01-.108.021-.055.01-.098.021-.142.032-.033.01-.054.01-.087.02-.044.011-.076.022-.109.032-.022.01-.043.01-.065.021-.033.01-.065.032-.098.042-.01.01-.033.01-.044.021a.964.964 0 00-.108.063 2.123 2.123 0 00-.654.693c-.174.304-.272.64-.272.986v17.996c0 1.574-.947 3.116-2.59 4.229-1.371.934-3.581 1.794-10.34 1.794-7.01 0-9.948-1.249-11.178-2.288-1.241-1.06-1.927-2.381-1.927-3.725V9.958c0-.357-.098-.693-.272-.986a1.517 1.517 0 00-.261-.368 1.855 1.855 0 00-.305-.272L5.997 8.3a.737.737 0 00-.12-.073l-.065-.032a.33.33 0 01-.087-.042l-.098-.031c-.022-.01-.043-.01-.076-.021a1.038 1.038 0 01-.141-.042h-.022a7.144 7.144 0 00-.773-.105c-.033 0-.065-.01-.109-.01H4.17V5.676h-.011zm34.744 22.277c0 3.641-2.264 7.04-6.074 9.097-2.231 1.207-6.911 1.9-12.843 1.9-5.867 0-11.31-.934-13.54-2.309-3.407-2.109-5.366-5.278-5.366-8.688V9.958c0-.315.152-.609.402-.797.011-.01.294-.2 1.753-.2 1.708 0 2.057.137 2.122.179a.983.983 0 01.425.808v17.995c0 1.648.816 3.253 2.296 4.512 1.992 1.69 5.997 2.55 11.897 2.55 7.075 0 9.447-.955 10.971-1.983 1.938-1.312 3.059-3.169 3.059-5.09V9.959c0-.336.163-.64.446-.818.044-.032.348-.168 1.829-.168 1.6 0 2.078.094 2.187.178a.999.999 0 01.436.819v17.985z" fill="#1A4881"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($j == 1)   
                                        <div class="seat"><div class="icon"></div></div>
                                        @endif
                                        @php
                                            $count +=2 ;   
                                        @endphp
                                        @endfor
                                    </div>
                                    @if ($i !== 4)   
                                    <hr class="separt" />
                                @endif
                                    @endfor
                                </div>
                            </div>


                        </div>
                    </div>
            <div class="d-flex justify-content-center">
                <button class="bg-blueSky border-0 mt-4 p-2 rounded-3 w-38" onclick="SubmitAllData()">
                    checkout
                </button>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    const showTrainsSeats = () => document.querySelector(".train").classList.toggle("hide-train");

    function chooseSeate(e)
    {
        const numnberSeat = e.target.closest('.seat-label')?.querySelector('.seat-number');

        //  if not difined the numberSeat stop the function 

        if (!numnberSeat || numnberSeat.dataset.color != "white" ) return;
        
        const AllSeats = document.querySelectorAll(".seat-number");
        
        // loop for all seats and check the value for data type and changet to white also the style for the path  

        AllSeats.forEach(seat => {
            if(seat.dataset.color == 'skyBlue')
            {
                
                seat.closest('.seat-label').querySelector("path").style.fill = 'white';
                seat.dataset.color = 'white'
                
            }
        });

        // chaange the style for the seat i cklick and the data type for hem 

        e.target.closest('.seat-label').querySelector("path").style.fill = 'skyBlue';
        e.target.closest('.seat-label').querySelector('.seat-number').dataset.color = 'skyBlue';
    }
    function SubmitAllData() {
    // Extract necessary data for ticket reservation
    const idTrain = "{{$train->id}}";
    const csrfToken ="{{ csrf_token() }}";

    // Select all seat elements
    const AllSeats = document.querySelectorAll(".seat-number");


    // Define a variable to store the selected seat numbers
    let selectedSeats = 0;

    // Loop through each seat element
    AllSeats.forEach(seat => {
        // Check if the seat is selected (has a skyBlue color)
        if (seat.dataset.color === 'skyBlue') {
            // Add the seat number to the selectedSeats array
            selectedSeats = seat.textContent ;
        }
    });
    // Construct data object for POST request
    const data = {
        _token: csrfToken,
        idTrain: idTrain,
        selectedSeats: selectedSeats
    };

   // Send POST request to reservation endpoint
    fetch("http://127.0.0.1:8000/reserve-place", {
        method: "POST",
        headers: {
            "Content-type": "application/json",
        },
        body: JSON.stringify(data),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        // console.log(data);
        window.location.href = `/My-ticket/${data}`;
    })
    .catch(error => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "somthing is wrong ",
            footer: '<a href="#">Why do I have this issue?</a>'
        });
    }
);

}
function displayClasses(e) {
    const buttonClicked = e.target;
    const allButtons = e.currentTarget.querySelectorAll("button");
    const train = document.querySelector(".contai");
    
    allButtons.forEach(button => {
        if (button.classList.contains("active")) {
            button.classList.remove("active");
        }
    });
    
    buttonClicked.classList.add("active");

    // position trains

    const leftPosition = {
        "1": "0px",
        "2": "-573px",
        "3": "-1259px"
    };
console.log(buttonClicked.dataset.class);
    train.style.left = leftPosition[buttonClicked.dataset.class];
}



</script>
@endsection
