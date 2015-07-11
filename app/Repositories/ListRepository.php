<?php namespace Todo\Repositories;


use Todo\UserList;

class ListRepository
{

    public function paginate($relations = [], $paginate = 25)
    {
        $query = UserList::with($relations);

        $query->where('user_id', auth()->user()->id);

        return $paginate ? $query->paginate($paginate) : $query->get();
    }

    public function store(array $params = [])
    {
    }
}
