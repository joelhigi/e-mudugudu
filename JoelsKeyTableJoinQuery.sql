SELECT first_name,last_name,gender,nid,passport_id,other_identification,impamvu_atagifite,dob,tel,nationality,icyo_akora,isano,amashuri_yize,ibyiciro_name,ubwisungane_name,umuryango_chef,inshingano_name
       FROM umuturage_ukodesha,ibyiciro,ubwisungane,umuryango,inshingano
       WHERE ibyiciro.ibyiciro_id = umuturage_ukodesha.ibyiciro_id
       AND ubwisungane.ubwisungane_id = umuturage_ukodesha.ubwisungane_id
       AND umuryango.umuryango_id = umuturage_ukodesha.umuryango_id
       AND inshingano.inshingano_id = umuturage_ukodesha.inshingano_id
