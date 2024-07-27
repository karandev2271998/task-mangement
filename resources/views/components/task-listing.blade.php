@props([
    'task',
])
<div>
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{$task->title}}
        </th>
        <td class="px-6 py-4">
            {{$task->description}}
        </td>
        <td class="px-6 py-4">
            {{$task->due_date}}
        </td>
        <td class="px-6 py-4">
            <div class="flex space-x-4">
                <a href="{{route('edit.task', ['id' => Crypt::encrypt($task->id)])}}"
                    class="text-blue-500 hover:text-blue-700">
                    <i class="fas fa-edit"></i>
                </a>
                <a onclick="if(!confirm('Are you sure you want to delete this task?')){return;}else{window.location.href='{{route('delete.task', ['id' => Crypt::encrypt($task->id)])}}'}"
                    class="text-red-500 hover:text-red-700">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </td>
    </tr>
</div>