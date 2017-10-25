<?php
/**
 * Created by PhpStorm.
 * User: Dmytro
 * Date: 19.10.2017
 * Time: 15:01
 */

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use UserBundle\Entity\Order;
use UserBundle\Entity\Itinerary;
use UserBundle\Entity\Cars;


class OrderController extends FOSRestController
{
    use \UserBundle\Helper\ControllerHelper;
    /**
     * @Rest\Get("/orders")
     */
    public function getAction()
    {
        //Просмотр всех заказов
        $restresult = $this->getDoctrine()->getRepository('UserBundle:Order')->findAll();
        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }

    /**
     * @Rest\Get("/orders/{id}")
     */
    public function idAction($id)
    {
        //Просмотр одного заказа
        $singleresult = $this->getDoctrine()->getRepository('UserBundle:Order')->find($id);
        if ($singleresult === null) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        }
        return $singleresult;
    }

    /**
     * @Rest\Post("/addOrder")
     */
    public function postAction(Request $request)
    {
        //Метод добавления заказа
        $data = new Order;
        $itinerary = new Itinerary;

        $array = $request->getContent();//Получаем json
        $array = json_decode($array, true);//Декодируем

        if (!isset($array['passanger_id'])  || !isset($array['access_token']) || !isset($array['car_id']) || !isset($array['driver_id'])
            || !isset($array['country_id']) || !isset($array['region_id']) || !isset($array['route_points']) || !isset($array['start_time']))
        {
            $response = new Response(json_encode(['Error' => "Method' is not defined"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }//Проверка на правильность названия ключевиков

        if (ctype_digit($array['passanger_id']) == false || ctype_digit($array['car_id']) == false || ctype_digit($array['driver_id']) == false
            || (ctype_digit($array['country_id']) == false) || ctype_digit($array['region_id']) == false)
        {
            $response = new Response(json_encode(['Error' => "Incorrect parameters of method"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }//Проверка на содержимое значения


        $token = "E@3dkCRjzjN9pskGA2~Ya4?mmPgwvI{K82yz";// Как я понял, токен здесь статичен и является чем-то вроде пароля к методу

        $passanger_id = $array['passanger_id'];//Начало получения данных, лишних не считываю, только те, что есть в запросе
        $access_token = $array['access_token'];
        $user_location1 = (string)$array['user_location'][0];
        $user_location2 = (string)$array['user_location'][1];
        $user_location =  $user_location1 . ',' . $user_location2;
        $car_id = $array['car_id'];
        $driver_id = $array['driver_id'];
        $country_id = $array['country_id'];
        $region_id = $array['region_id'];
        $route_points = $array['route_points'];
        $em = $this->getDoctrine()->getManager();
        foreach ($route_points as $point)//Запись в отдельную таблицу базы массива точек маршрута, привязываются к id_driver
        {
            $address = $point['adress'];
            $lat = $point['lat'];
            $lon = $point['lon'];
            $sort = $point['sort'];
            $itinerary->setIdroute($passanger_id);
            $itinerary->setAddress($address);
            $itinerary->setLat($lat);
            $itinerary->setLon($lon);
            $itinerary->setSort($sort);
            $em->persist($itinerary);
            $em->flush();
            $em->clear();
        }
        $start_time = $array['start_time'];//Конец считывания

        if ($access_token != $token){
            $response = new Response(json_encode(['Error' => "Invalide access token:$access_token"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }// Проверка на правильность токена

        $user = $this->getDoctrine()->getRepository('UserBundle:User')->find($passanger_id);

        if ($user == NULL){
            $response = new Response(json_encode(['Error' => "User id not found"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }// Проверка на существование юзера

        $data->setLocation($user_location);//Запись данных в модель и в базу: начало
        $data->setAuto($car_id);
        $data->setCountry($country_id);
        $data->setRegion($region_id);
        $data->setDriver($driver_id);
        $data->setTime($start_time);
        $data->setActive(0);

        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();//Конец

        $order_id = $data->getId();//Формируем и отправляем ответ
        $order_status_id = $data->getActive();

        $response = new Response(json_encode([
            'order_id' => $order_id,
            'oredr_status_id' => $order_status_id,
            'order_status' => 'Ожидает ответа водителя'
        ]), Response::HTTP_OK); //Меня очень смутило название oredr, т.к оно используется и в другом методе, оставил как есть
        return $this->setBaseHeaders($response);
    }

    /**
     * @Rest\Put("/setOrderStatus")
     */
    public function updateAction(Request $request)
    {
        //Метод редактирования статуса заказа
        $data = new Order;
        $itinerary = new Itinerary;
        $sn = $this->getDoctrine()->getManager();

        $array = $request->getContent();//Получение данных
        $array = json_decode($array, true);

        if (!isset($array['access_token'])  || !isset($array['driver_id']) || !isset($array['order_id']) || !isset($array['oredr_status_id']))
        {
            $response = new Response(json_encode(['Error' => "Method' is not defined"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }//Проверка на правильность названия ключевиков

        if (ctype_digit($array['driver_id']) == false || ctype_digit($array['order_id']) == false || ctype_digit($array['oredr_status_id']) == false)
        {
            $response = new Response(json_encode(['Error' => "Incorrect parameters of method"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }//Проверка на содержимое значения

        $access_token = $array['access_token'];//Получение данных
        $driver_id = $array['driver_id'];
        $order_id = $array['order_id'];
        $status = $array['oredr_status_id'];

        if ((int)$status < 0 || (int)$status > 6){
            $response = new Response(json_encode(['Error' => "Incorrect value oredr_status_id"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }//Проверка статуса заказа на > 0 и < 6

        $data = $this->getDoctrine()->getRepository('UserBundle:Order')->find($order_id);
        $user = $this->getDoctrine()->getRepository('UserBundle:User')->find($driver_id);

        if ($user == NULL){
            $response = new Response(json_encode(['Error' => "User id not found"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }//Проверка на юзера

        $token = 'E@3dkCRjzjN9pskGA2~Ya4?mmPgwvI{K82yz';//Если нужно использовать токен юзера, легко поменять

        if ($access_token != $token){
            $response = new Response(json_encode(['Error' => "Invalide access token:$access_token"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }//Проверка токена


        $data->setDriver($driver_id);//Запись в модель и базу
        $data->setID($order_id);
        $data->setActive($status);

        $sn->flush();

        $response = new Response(json_encode(['success' => $status]), Response::HTTP_OK);
        return $this->setBaseHeaders($response);
    }

    /**
     * @Rest\Get("/getMapInfo")
     */
    public function getActionMap(Request $request)
    {
        //Метод получения данных для отображения карты. Здесь я не совсем понял, почему мы возвращаем массив обьектов
        //машин, и не понятно по каким критериям делать выборку, поэтому возвращаются все записи из таблицы.
        //При надобности выборку легко можно добавить
        $array = $request->query;

        $access_token = $array->get('access_token');//Получаем данные из GET запроса
        $lat = $array->get('lat');
        $lng = $array->get('lng');

        if (!isset($access_token) || !isset($lat) || !isset($lng))
        {
            $response = new Response(json_encode(['Error' => "Method' is not defined"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }//Проверка на правильность названия ключевиков

        $token = 'E@3dkCRjzjN9pskGA2~Ya4?mmPgwvI{K82yz';

        if ($access_token != $token){
            $response = new Response(json_encode(['Error' => "Invalide access token:$access_token"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }//Проверка токена

        $cars = $this->getDoctrine()->getRepository('UserBundle:Cars')->findall();

        if ($cars == NULL)
        {
            $response = new Response(json_encode(['Error' => "No cars"]), Response::HTTP_CREATED);
            return $this->setBaseHeaders($response);
        }//Проверка на наличие авто

        $i = 0;
        $answer = [];

        foreach ($cars as $car){
            array_push($answer, [
            'id' => $car->getId(),
            'status' => $car->getStatus(),
            'color' => $car->getColor(),
            'direction' => $car->getDirection(),
            'reg_number' => $car->getNumber(),
            'yer' => $car->getYer(),
            'brand' => $car->getBrand(),
            'model' => $car->getModel(),
            'currency' => $car->getCurrency(),
            'planting_costs' => $car->getPlanting(),
            'driver_phone' => $car->getPhone(),
            'costs_per_1' => $car->getCosts(),
            'car_photo' => $car->getPhoto(),
            'location' => [$car->getLat(), $car->getLan()]
            ]);
            $i++;
        }//Формирование в цикле ответа, т.к машин может быть несколько

        $response = new Response(json_encode(["cars" => $answer]), Response::HTTP_OK);
        return $this->setBaseHeaders($response);
    }


    /**
     * @Rest\Delete("/user/{id}")
     */
    public function deleteAction($id)
    {
        $data = new Order;
        $sn = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        if (empty($user)) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($user);
            $sn->flush();
        }
        return new View("deleted successfully", Response::HTTP_OK);
    }

}