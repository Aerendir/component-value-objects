## About Email value object

The Email object doesn't return Uri objects for the host part of the email as we don't know its real schema (especially
if it is http or https), so we don't need an object to manage it but it is sufficient to use a property to manage it.