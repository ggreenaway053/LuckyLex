using UnityEngine;
using System.Collections;

public class PatrolState : MonoBehaviour, IEnemyState {

	private enemy enemy;
	private float patrolTimer;

	private float patrolDuration = 10;

	public void Execute ()
	{
		Patrol ();

		enemy.MoveEnemy ();

		if (enemy.Target != null && enemy.InAttackRange) {
			enemy.ChangeState (new MeleeState ());
		} 

		else if (enemy.Target != null) 
		{
			enemy.MoveEnemy ();
		} 

		else 
		{
			enemy.ChangeState (new IdleState ());
		}
	}

	public void Enter (enemy enemy)
	{
		this.enemy = enemy;
	}

	public void Exit ()
	{

	}

	public void OnTriggerEnter (Collider2D other)
	{
		if (other.tag == "Edge") 
		{
			Debug.Log ("Turning");
			enemy.changeDirection ();
		}
	}



	private void Patrol()
	{
		patrolTimer += Time.deltaTime;

		if (patrolTimer >= patrolDuration) 
		{
			enemy.ChangeState(new IdleState());
		}
	}
}