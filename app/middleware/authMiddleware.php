<?php
    namespace app\middleware;

    use Firebase\JWT\JWT;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;  

    class authMiddleware {
        public function handle(Request $request, callable $next) {
            $authorizationHeader = $request->headers->get('Authorization');
            if (!$authorizationHeader) {
                return new Response(json_encode(['error' => 'No autorizado']), 401);
            }

            list($jwt) = sscanf($authorizationHeader, 'Bearer %s');

            if(!$jwt){
                return new Response(json_encode(['error' => 'No autorizado']), 401);
            }

            try {
                $decoded = JWT::decode($jwt, $_ENV['JWT_SECRET'], ['HS256']);
                $request->attributes->set('user', $decoded);
            } catch(\Exception $e) {
                return new Response(json_encode(['error' => 'Token Invalido']), 401);
            }

            return $next($request);
        }
    }
?>  