<a href="{{route('category.index')}}">HOME</a><br><br>

@foreach ($categories as $category)
     <a href="{{route('category.map',$category)}}">{{$category->name}}</a>
 @endforeach

 <br>

 @foreach ($chain as $item)
     <a href="{{route('category.map',$item)}}"> {{$item->name}} ></a>
 @endforeach

 