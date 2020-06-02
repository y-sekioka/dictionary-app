@if(count($search_result) == 0)
    <p class="no_data">※検索文字列「{{ $search_word }}」を含むする単語がありませんでした。</p>
@else
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>単語</th>
            <th>説明</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($search_result as $result)
            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->word }}</td>
                <td>{{ $result->explain }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif