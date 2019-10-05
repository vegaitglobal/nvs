ALTER TABLE `wishlist`
    ADD `hours` INT NOT NULL AFTER `datum`,
    ADD `hours_approved` BOOLEAN NULL DEFAULT NULL
    AFTER `hours`;
