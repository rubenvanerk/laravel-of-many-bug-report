<style>
    table, th, td {
        border: 1px solid black;
    }
</style>

<h1>Result</h1>
<table>
    <thead>
        <th>Product name</th>
        <th>Product price</th>
        <th>Category name</th>
        <th>Category published</th>
    </thead>
    <tbody>
        <td>{{ $cheapestProduct->name }}</td>
        <td>{{ $cheapestProduct->price }}</td>
        <td>{{ $cheapestProduct->category->name }}</td>
        <td>{{ $cheapestProduct->category->published ? 'Yes' : 'No' }}</td>
    </tbody>
</table>

<h1>Expected result</h1>
<table>
    <thead>
    <th>Product name</th>
    <th>Product price</th>
    <th>Category name</th>
    <th>Category published</th>
    </thead>
    <tbody>
    <td>{{ $actuallyCheapestProduct->name }}</td>
    <td>{{ $actuallyCheapestProduct->price }}</td>
    <td>{{ $actuallyCheapestProduct->category->name }}</td>
    <td>{{ $actuallyCheapestProduct->category->published ? 'Yes' : 'No' }}</td>
    </tbody>
</table>
