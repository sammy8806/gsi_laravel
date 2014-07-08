<?php

class TicketController extends \BaseController {

   /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index() {
      return View::make('user.ticket_list', ['tickets' => Ticket::all()]);
   }


   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create() {

      $cats = [];
      foreach (TicketCategory::all() as $cat) {
         $cats[$cat->id] = $cat->name;
      }

      return View::make('user.ticket_create', [
            'tickets'    => new Ticket(),
            'categories' => $cats
      ]);
   }


   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store() {
      $rules = [
            'priority' => 'AlphaNum',
            'title'    => 'Required',
            'text'     => 'Required',
            'status'   => 'Required',
            'category' => 'Required|Exists:ticket_categories,id'
      ];

      $v = Validator::make(Input::all(), $rules);

      if ($v->passes()) {
         $ticket = new Ticket();
         $ticket->fill(Input::all());
         $ticket->issuer()->associate(Auth::getUser());

         if (Input::get('category')) {
            $cat = TicketCategory::findOrFail(Input::get('category'));
            $ticket->category()->associate($cat);
         }

         $ticket->save();

         return Redirect::action('TicketController@index');
      } else {
         return Redirect::action('TicketController@create')->withErrors($v->getMessageBag());
      }

   }


   /**
    * Display the specified resource.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function show($id) {
      //
   }


   /**
    * Show the form for editing the specified resource.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function edit($id) {
      $ticket = Ticket::findOrFail($id);

      $ticket = [];
      foreach (Ticket::all() as $ticket) {
         $ticket[$ticket->id] = $ticket->name;
      }

      return View::make('user.Ticket_edit', [
            //'priority' => $priority,
//            'title'    => $title,
//            'text'     => $text,
//            'status'   => $status,
//            'category' => $category,
      ]);

   }


   /**
    * Update the specified resource in storage.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function update($id) {
      //
   }


   /**
    * Remove the specified resource from storage.
    *
    * @param  int $id
    *
    * @return Response
    */
   public function destroy($id) {
      //
   }

}
