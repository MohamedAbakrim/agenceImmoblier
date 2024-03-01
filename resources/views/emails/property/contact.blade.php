<x-mail::message>
# Nouvelle demande de contact

une nouvelle demande de contact à été fait pour le bien <a href="{{route('property.show', ['slug'=>$property->getSlug(), 'property'=>$property])}}">{{$property->title}}</a>

- Prénom : {{$data['firstname']}}
- Nom : {{$data['lastname']}}
- Téléphone : {{$data['phone']}}
- Email : {{$data['email']}}

**Message :**
{{$data['message']}}

</x-mail::message>
