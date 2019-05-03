<?php
namespace App\Culqi\Error;

/**
 * Culqi Exceptions
 */

/**
 * Base Culqi Exception
 */
class CulqiException extends \Exception {
    protected $message = "Base Culqi Exception";
}
/**
 * Input validation error
 */
namespace App\Culqi\Error;

class InputValidationError extends CulqiException {
    protected $message = "Input validation error. Error en alguno de los campos";
}
/**
 * Authentication error
 */
namespace App\Culqi\Error;

class AuthenticationError extends CulqiException {
    protected $message = "Error de autenticación";
}
/**
 * Resource not found
 */
namespace App\Culqi\Error;

class NotFound extends CulqiException {
    protected $message = "Resource not found";
}
/**
 * Method not allowed
 */
namespace App\Culqi\Error;

class MethodNotAllowed extends CulqiException {
    protected $message = "Method not allowed";
}
/**
 * Unhandled error
 */
namespace App\Culqi\Error;

class UnhandledError extends CulqiException {
    protected $message = "Unhandled error";
}
/**
 * Invalid API Key
 */
namespace App\Culqi\Error;

class InvalidApiKey extends CulqiException {
    protected $message = "API Key invalido";
}
/**
 * Unable to connect to Culqi API
 */
class UnableToConnect extends CulqiException {
    protected $message = "Imposible conectar a Culqi API";
}
