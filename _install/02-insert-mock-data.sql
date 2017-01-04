USE `mini`;

INSERT INTO `listings`(`address`, `city`, `zip`, `description`, `image`, `price`, `bathroom`, `bedroom`)
    VALUES ('1232 floorway blvd','san francisco', 94010, 'A room with a nice view.', file_get_contents('mini-logo.png'), 2203, 1,1),
        ('122 el camino street','south san francisco', 92133, 'Tower room with curtains.', file_get_contents('mini-logo.png'), 432, 1,1),
        ('154 el camino street','south san francisco', 92133, 'Tower room with curtains.', file_get_contents('mini-logo.png'), 800, 2,1),
    ('132 broadway ave','Daly City', 94234, 'Small apartment.', file_get_contents('mini-logo.png'), 1400, 3,2);